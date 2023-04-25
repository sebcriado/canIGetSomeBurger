<?php

namespace App\Controller;

use App\Model\FoodModel;

class HomeController
{

    public function index()
    {
        $foodModel = new FoodModel();
        $foods = $foodModel->getAllFoods();

        // Affichage : inclusion du css
        $css = 'accueil.css';

        // Affichage : inclusion du template
        $pageTitle = "Can i get some burger 🍔";
        $template = 'accueil';
        include '../templates/base.phtml';
    }
}
