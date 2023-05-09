<?php

namespace App\Controller;

use App\Model\UserModel;
use App\Entity\User;

class UserModifyController
{

    public function index()
    {

        $userModel = new UserModel();

        $user = isset($_SESSION['user']) ? $_SESSION['user'] : null;

        if ($user) {
            $firstname = $user->getFirstname();
            $lastname = $user->getLastname();
            $email = $user->getEmail();
            $phone = $user->getPhone();
            $address = $user->getAddress();
        }

        if (!empty($_POST)) {

            $firstname = strip_tags(trim($_POST['firstname']));
            $lastname = strip_tags(trim($_POST['lastname']));
            $email = strip_tags(trim($_POST['email']));
            $phone = strip_tags(trim($_POST['phone']));
            $address = strip_tags(trim($_POST['address']));


            $userModel->modifyUser($firstname, $lastname, $email, $phone, $address, $user->getUserId());

            $_SESSION['flashbag'] = 'Vos modifications sont enregistrés';

            header("Location: " . constructUrl('home'));
            exit;
        }

        // Récupérer le message flash le cas échéant
        if (array_key_exists('flashbag', $_SESSION) && $_SESSION['flashbag']) {

            $flashMessage = $_SESSION['flashbag'];
            $_SESSION['flashbag'] = null;
        }

        // Affichage : inclusion du css
        $css = 'modifyUser.css';

        // Affichage : inclusion du template
        $pageTitle = "Modifier";
        $template = 'userModify';
        include '../templates/base.phtml';
    }
}
