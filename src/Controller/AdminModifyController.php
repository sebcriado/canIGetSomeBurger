<?php

namespace App\Controller;

use App\Model\FoodModel;
use App\Entity\Food;

class AdminModifyController
{


    public function index()
    {
        $foodId = $_GET['foodId'];

        $foodModel = new FoodModel();
        $food = $foodModel->getFoodId($foodId);

        $title = $food->getTitle();
        $image = $food->getImage();
        $description = $food->getDescription();
        $price = $food->getPrice();


        if (!empty($_POST)) {

            $title = $_POST['title'];
            $image = $_POST['image'];
            $description = $_POST['description'];
            $price = $_POST['price'];

            $foodModel->modifyFood($title, $image, $description, $price, $foodId);

            $_SESSION['flashbag'] = 'Le produit à bien été modifié !';

            header("Location: " . constructUrl('adminHome'));
            exit;
        }

        // Affichage : inclusion du css
        $css = 'modifyAdmin.css';

        // Affichage : inclusion du template
        $pageTitle = "Modifier";
        $template = 'adminModify';
        include '../templates/baseAdmin.phtml';
    }
}
