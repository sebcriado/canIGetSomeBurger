<?php

use App\Core\Database;
use App\Service\AdminFiles;
function asset(string $path)
{
    return BASE_URL . '/' . $path;
}

function constructUrl(string $routeName, array $params = [])
{
    // Si la route donnée en paramètre n'existe pas, on lance une Exception
    if (!array_key_exists($routeName, ROUTES)) {
        throw new Exception('ERREUR : pas de route nommée' . $routeName);
    }

    $url =  BASE_URL . '/index.php' . ROUTES[$routeName]['path'];

    if ($params) {
        $url .= '?' . http_build_query($params);
    }

    return $url;
}

function validateForm(string $firstname, string $lastname, string $email, string $phone, string $password, string $password2, string $adress)
{
    $errors = [];

    if (!$firstname) {
        $errors['firstname'] = "Le champ 'Nom' est obligatoire";
    }

    if (!$lastname) {
        $errors['lastname'] = "Le champ 'Prénom' est obligatoire";
    }

    if (!$email) {
        $errors['email'] = "Le champ 'Email' est obligatoire";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "L'email n'est pas valide";
    }

    if (!$phone) {
        $errors['phone'] = "Le champ 'Téléphone' est obligatoire";
    }

    if (!$password and strlen($password < 8)) {
        $errors['password'] = "Le champ 'Mot de passe' est obligatoire et doit comporter au moins 8 caractères";
    }

    if ($password !== $password2) {
        $errors['passwordVerify'] = "Les mots de passe doivent être identiques";
    }

    if (!$adress) {
        $errors['address'] = "Le champ 'Adresse' est obligatoire";
    }

    if (emailExist($email)) {
        $errors['emailExist'] = 'Le mail existe déjà';
    }

    return $errors;
}

function validateFoodForm(string $title, array $image, string $description, string $price)
{
    $errors = [];

    if (!$title) {
        $errors['title'] = "Le champ 'Titre' est obligatoire";
    }

    if ($image['error'] == UPLOAD_ERR_NO_FILE) {
        $errors['image'] = "Le champ 'Image' est obligatoire";
    } else{
        $adminFiles = new AdminFiles;
        $errors = $adminFiles->fileSize($errors, $image['tmp_name']);
        $errors = $adminFiles->fileType($errors, $image['tmp_name']);
    }

    if (!$description) {
        $errors['description'] = "Le champ 'Description' est obligatoire";
    } elseif (strlen($description) < 10 || strlen($description) > 600) {
        $errors['description'] = 'Le champ "Description" doit comporter entre 10 et 600 caractères';
    }

    if (!$price) {
        $errors['price'] = "Le champ 'Prix' est obligatoire";
    }

    return $errors;
}

function emailExist($email)
{
    $bdd = new Database();
    $pdo = $bdd->dataBaseConnect();

    $reqMail = $pdo->prepare("SELECT * FROM user WHERE email=?");
    $reqMail->execute(array($email));
    $mailExist = $reqMail->rowCount();

    if ($mailExist == 1) {
        return true;
    } else {
        return false;
    }
}

function isConnected(): bool
{
    return array_key_exists('user', $_SESSION);
}
