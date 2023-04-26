<?php

namespace App\Controller;

use App\Entity\Food;
use App\Model\FoodModel;


class AdminHomeController
{

    public function index()
    {


        $title = "";
        $image = "";
        $description = "";
        $price = "";

        if (isset($_POST) and !empty($_POST)) {

            $title = $_POST['title'];
            $image = $_POST['image'];
            $description = $_POST['description'];
            $price = $_POST['price'];

            $errors = validateFoodForm($title, $image, $description, $price);

            if (!$errors) {

                $newFood = new FoodModel();
                $newFood->addNewFood($title, $image, $description, $price);
                $_SESSION['flashbag'] = 'Le produit à bien été ajouté !';

                header("Location: " . $_SERVER["PHP_SELF"]);
                exit;
            }
        }

        $foodModel = new FoodModel();
        $foods = $foodModel->getAllFoods();

        // Récupérer le message flash le cas échéant
        if (array_key_exists('flashbag', $_SESSION) && $_SESSION['flashbag']) {

            $flashMessage = $_SESSION['flashbag'];
            $_SESSION['flashbag'] = null;
        }

        // Affichage : inclusion du css
        $css = 'homeAdmin.css';

        // Affichage : inclusion du template
        $pageTitle = "Accueil";
        $template = 'adminHome';
        include '../templates/baseAdmin.phtml';
    }
}