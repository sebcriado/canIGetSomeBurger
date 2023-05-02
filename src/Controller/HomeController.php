<?php

namespace App\Controller;

use App\Model\FoodModel;

class HomeController
{

    public function index()
    {
        $foodModel = new FoodModel();
        $foods = $foodModel->getAllFoods();


        // Récupérer le message flash le cas échéant
        if (array_key_exists('flashbag', $_SESSION) && $_SESSION['flashbag']) {

            $flashMessage = $_SESSION['flashbag'];
            $_SESSION['flashbag'] = null;
        }

        // Affichage : inclusion du css
        $css = 'home.css';

        // Affichage : inclusion du template
        $pageTitle = "Can i get some burger 🍔";
        $template = 'home';
        include '../templates/base.phtml';
    }
}
