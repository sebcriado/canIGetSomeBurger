<?php

namespace App\Controller;

use App\Entity\User;
use App\Model\UserModel;
use App\Service\UserSession;

class AdminLoginController
{


    public function index()
    {

        $email = "";
        $password = "";

        if (isset($_POST) and !empty($_POST)) {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $userModel = new UserModel();
            $user = $userModel->getUser($email);


            if (!$user) {
                $errors = ['email' => 'Identifiants incorrects'];
            } else {

                $userEntity = new User($user);

                $passwordHash = $userEntity->getPassword();
                $userRole = $userEntity->getRole();

                if ($userRole === 'user') {
                    $errors['role'] = "Vous n'êtes pas autorisés à vous connecter";
                } else {

                    if (password_verify($password, $passwordHash)) {
                        // L'utilisateur est connecté avec succès

                        $userSession = new UserSession();
                        $userSession->register($userEntity);


                        $_SESSION['flashbag'] = 'Vous êtes maintenant connecté !';

                        header('Location:' . constructUrl('adminHome'));
                        exit();
                    } else {
                        // Les identifiants sont incorrects
                        $errors = ['email' => 'Identifiants incorrects'];
                    }
                }
            }
        }

        // Récupérer le message flash le cas échéant
        if (array_key_exists('flashbag', $_SESSION) && $_SESSION['flashbag']) {

            $flashMessage = $_SESSION['flashbag'];
            $_SESSION['flashbag'] = null;
        }

        // Affichage : inclusion du css
        $css = 'loginAdmin.css';

        // Affichage : inclusion du template
        $pageTitle = "ConnexionAdmin";
        $template = 'loginAdmin';
        include '../templates/baseAdmin.phtml';
    }
}
