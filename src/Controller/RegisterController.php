<?php

namespace App\Controller;

use \App\Entity\User;
use App\Model\UserModel;

class RegisterController
{

    public function index()
    {

        $firstname = "";
        $lastname = "";
        $email = "";
        $phone = "";
        $adress = "";

        if (isset($_POST) and !empty($_POST)) {

            $user = new User();

            $firstname = htmlspecialchars($_POST['firstname']);
            $lastname = htmlspecialchars($_POST['lastname']);
            $email = htmlspecialchars($_POST['email']);
            $phone = htmlspecialchars($_POST['phone']);
            $password = htmlspecialchars($_POST['password']);
            $password2 = htmlspecialchars($_POST['password2']);
            $adress = htmlspecialchars($_POST['address']);

            $errors = validateForm($firstname, $lastname, $email, $phone, $password, $password2, $adress);

            if (!$errors) {
                $password = password_hash($password, PASSWORD_DEFAULT);

                $userModel = new UserModel();
                $userModel->addNewUser($firstname, $lastname, $email, $password, $phone, $adress);

                $_SESSION['flashbag'] = 'Votre inscription à bien été pris en compte !';

                header("Location: " . $_SERVER["PHP_SELF"]);
                exit;
            }
        }

        // Récupérer le message flash le cas échéant
        if (array_key_exists('flashbag', $_SESSION) && $_SESSION['flashbag']) {

            $flashMessage = $_SESSION['flashbag'];
            $_SESSION['flashbag'] = null;
        }

        // Affichage : inclusion du css
        $css = 'inscription.css';

        // Affichage : inclusion du template
        $pageTitle = 'Inscription';
        $template = 'inscription';
        include '../templates/base.phtml';
    }
}
