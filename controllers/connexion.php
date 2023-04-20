<?php

use App\Entity\User;
use App\Model\UserModel;

$newUser = null;

if (array_key_exists('user', $_SESSION)) {
    $newUser = $_SESSION['user'];
    $_SESSION['user'] = null;
    session_unset();
}

$email = "";
$password = "";

if (isset($_POST) and !empty($_POST)) {

    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $userModel = new UserModel();
    $user = $userModel->getUser($email);

    $userPassword = new User($user);

    $passwordHash = $userPassword->getPassword();

    if ($user !== false && password_verify($password, $passwordHash)) {
        // L'utilisateur est connecté avec succès
        $_SESSION['userId'] = $userPassword->getUserId();
        $_SESSION['flashbag'] = 'Vous êtes maintenant connecté !';

        header('Location:' . constructUrl('/'));
        exit();
    } else {
        // Les identifiants sont incorrects
        $errors = ['email' => 'Identifiants incorrects'];
    }
}

// Récupérer le message flash le cas échéant
if (array_key_exists('flashbag', $_SESSION) && $_SESSION['flashbag']) {

    $flashMessage = $_SESSION['flashbag'];
    $_SESSION['flashbag'] = null;
}


// Affichage : inclusion du css
$css = 'connexion.css';

// Affichage : inclusion du template
$pageTitle = "Connexion";
$template = 'connexion';
include '../templates/base.phtml';
