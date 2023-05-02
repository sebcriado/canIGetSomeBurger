<?php

namespace App\Controller;

use App\Model\UserModel;
use App\Entity\User;

class UserModifyController
{

    public function index()
    {

        $userModel = new UserModel();
        $userId = isset($_SESSION['userId']) ? $_SESSION['userId'] : null;

        if ($userId) {
            $users = $userModel->getUserId($userId);
            $firstname = $users->getFirstname();
            $lastname = $users->getLastname();
            $email = $users->getEmail();
            $phone = $users->getPhone();
            $address = $users->getAddress();
        }

        if (!empty($_POST)) {

            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];


            $userModel->modifyUser($firstname, $lastname, $email, $phone, $address, $userId);

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
