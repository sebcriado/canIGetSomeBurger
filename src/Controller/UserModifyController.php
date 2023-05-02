<?php

namespace App\Controller;

use App\Model\UserModel;
use App\Entity\User;

class UserModifyController
{

    public function index()
    {
        $userId = $_GET['userId'];

        $userModel = new UserModel();
        $users = $userModel->getUserId($userId);

        $firstname = $users->getFirstname();
        $lastname = $users->getLastname();
        $email = $users->getEmail();
        $phone = $users->getPhone();
        $address = $users->getAddress();



        if (!empty($_POST)) {

            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];


            $userModel->modifyUser($firstname, $lastname, $email, $phone, $address, $userId);

            $_SESSION['flashbag'] = 'Vos modifications sont enregistrés';

            header("Location: " . constructUrl('userModify'));
            exit;
        }

        // Affichage : inclusion du css
        $css = 'modifyUser.css';

        // Affichage : inclusion du template
        $pageTitle = "Modifier";
        $template = 'userModify';
        include '../templates/baseAdmin.phtml';
    }
}
