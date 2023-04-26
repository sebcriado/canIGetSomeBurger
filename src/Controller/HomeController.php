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
        $css = 'home.css';

        // Affichage : inclusion du template
        $pageTitle = "Can i get some burger 🍔";
        $template = 'home';
        include '../templates/base.phtml';
    }
}
