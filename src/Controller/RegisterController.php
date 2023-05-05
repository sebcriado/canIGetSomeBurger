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

            $firstname = strip_tags(trim($_POST['firstname']));
            $lastname = strip_tags(trim($_POST['lastname']));
            $email = strip_tags(trim($_POST['email']));
            $phone = strip_tags(trim($_POST['phone']));
            $password = strip_tags(trim($_POST['password']));
            $password2 = strip_tags(trim($_POST['password2']));
            $adress = strip_tags(trim($_POST['address']));

            $errors = validateForm($firstname, $lastname, $email, $phone, $password, $password2, $adress);

            if (!$errors) {
                $password = password_hash($password, PASSWORD_DEFAULT);

                $userModel = new UserModel();
                $userModel->addNewUser($firstname, $lastname, $email, $password, $phone, $adress);

                $_SESSION['flashbag'] = 'Votre inscription à bien été pris en compte !';

                header("Location: " . constructUrl('login'));
                exit;
            }
        }

        // Récupérer le message flash le cas échéant
        if (array_key_exists('flashbag', $_SESSION) && $_SESSION['flashbag']) {

            $flashMessage = $_SESSION['flashbag'];
            $_SESSION['flashbag'] = null;
        }

        // Affichage : inclusion du css
        $css = 'register.css';

        // Affichage : inclusion du template
        $pageTitle = 'Inscription';
        $template = 'inscription';
        include '../templates/base.phtml';
    }
}
