<?php

namespace App\Service;



class AdminFiles
{


    public function slugify(string $string)
    {
        // Remplace les caractères spéciaux par des tirets
        $string = preg_replace('/[^\p{L}\p{N}]+/u', '-', $string);

        // Convertit en minuscules
        $string = mb_strtolower($string, 'UTF-8');

        // Supprime les tirets en début et fin de chaîne
        $string = trim($string, '-');

        // Supprime les tirets répétés
        $string = preg_replace('/-+/', '-', $string);

        return $string;
    }

    public function filePath(string $filename)
    {

        $filename = '';

        if (array_key_exists('image', $_FILES) && $_FILES['image']['error'] != UPLOAD_ERR_NO_FILE) {

            // Nettoyer le nom du fichier
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $basename = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);

            // Slugification du nom du fichier (on supprime caractères spéciaux, accents, majuscules, espaces, etc)
            $basename = AdminFiles::slugify($basename);

            // On ajoute une chaîne aléatoire pour éviter les conflits
            $filename = $basename . sha1(uniqid(rand(), true)) . '.' . $extension;

            // Copier le fichier temporaire dans notre dossier "images"
            if (!file_exists('images')) {
                mkdir('images');
            }

            move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $filename);
        }

        return $filename;
    }


    public function fileSize($filesize)
    {

        // Validation de l'image si un fichier a été uploadé
        if (array_key_exists('image', $_FILES) && $_FILES['image']['error'] != UPLOAD_ERR_NO_FILE) {

            // Validation du poids du fichier
            $filesize = filesize($_FILES['image']['tmp_name']);
            if ($filesize > MAX_UPLOAD_SIZE) {
                $errors['image'] = 'Votre fichier excède 1 Mo.';
            }
        }

        return $filesize;
    }


    public function fileType()
    {

        $errors = [];
        if (array_key_exists('image', $_FILES) && $_FILES['image']['error'] != UPLOAD_ERR_NO_FILE) {

            // Validation du type de fichier
            $allowedMimeTypes = ['image/jpeg', 'image/png'];
            $mimeType = mime_content_type($_FILES['image']['tmp_name']);

            if (!in_array($mimeType, $allowedMimeTypes)) {
                $errors['image'] = 'Type de fichier non autorisé';
            }
        }

        return true;
    }
}
