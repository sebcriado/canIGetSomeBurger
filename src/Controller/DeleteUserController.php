<?php

namespace App\Controller;

use App\Model\UserModel;

class DeleteUserController
{

    public function index()
    {

        $userId = $_GET['user'];


        if (!isset($_GET['user'])) {
            $errors['user'] = "Erreur, l'id est introuvable";
        }

        if (!$errors) {

            $userModel = new UserModel();
            $userModel->getUserId($userId);

            $userModel->deleteUser($userId);

            $_SESSION['flashbag'] = "L'ultilisateur à bien été supprimé !";

            header("Location: " . constructUrl('adminHome'));
            exit;
        }
    }
}
