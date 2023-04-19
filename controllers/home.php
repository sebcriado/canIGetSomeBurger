<?php

$foodModel = new App\Model\FoodModel();
$foods = $foodModel->getAllFoods();

// Affichage : inclusion du css
$css = 'accueil.css';

// Affichage : inclusion du template
$pageTitle = "Can i get some burger 🍔";
$template = 'accueil';
include '../templates/base.phtml';
