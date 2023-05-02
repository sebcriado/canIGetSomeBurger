<?php

namespace App\Controller;

use App\Model\FoodModel;

class DeleteFoodController
{


    public function index()
    {

        $foodId = $_GET['foodId'];


        if (!isset($_GET['foodId'])) {
            $errors['foodId'] = "Erreur, l'id est introuvable";
        }

        if (!$errors) {

            $foodModel = new FoodModel();
            $foodModel->getFoodId($foodId);

            $foodModel->deleteFood($foodId);

            $_SESSION['flashbag'] = 'Le produit à bien été supprimé !';

            header("Location: " . constructUrl('adminHome'));
            exit;
        }
    }
}
