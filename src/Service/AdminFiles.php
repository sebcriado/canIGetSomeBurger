<?php

namespace App\Service;



class AdminFiles
{


    public static function slugify(string $string)
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

    public function uploadFile(string $filename, string $tempPath, string $destFolder)
    {

            $filename = $this->cleanFile($filename, $tempPath);

            // Copier le fichier temporaire dans notre dossier "images"
            if (!file_exists($destFolder)) {
                 mkdir($destFolder);
            }

            move_uploaded_file($tempPath, $destFolder . "/" . $filename);
        

        return $filename;
    }

    public function cleanFile(string $filename){

        // Nettoyer le nom du fichier
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $basename = pathinfo($filename, PATHINFO_FILENAME);

        // Slugification du nom du fichier (on supprime caractères spéciaux, accents, majuscules, espaces, etc)
        $basename = self::slugify($basename);

        // On ajoute une chaîne aléatoire pour éviter les conflits
        $filename = $basename . sha1(uniqid(rand(), true)) . '.' . $extension;

        return $filename;
    }


    public function fileSize(array $errors, string $tempPath)
    {
        
            // Validation du poids du fichier
            $filesize = filesize($tempPath);
            if ($filesize > MAX_UPLOAD_SIZE) {
                $errors['image'] = 'Votre fichier excède 1 Mo.';
            }
        

        return $errors;
    }


    public function fileType(array $errors,string $tempPath)
    {
       
            // Validation du type de fichier
            $allowedMimeTypes = ['image/jpeg', 'image/png'];
            $mimeType = mime_content_type($tempPath);

            if (!in_array($mimeType, $allowedMimeTypes)) {
                $errors['image'] = 'Type de fichier non autorisé';
            }

        return $errors;
    }
}
