<?php

use App\Core\Database;

function asset(string $path)
{
    return BASE_URL . '/' . $path;
}

function constructUrl(string $path, array $params = [])
{
    $url =  BASE_URL . '/index.php' . $path;

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
    return array_key_exists('userId', $_SESSION);
}
