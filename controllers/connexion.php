<?php

$formModel = new App\Model\FormModel;
$users = $formModel->getAllUsers();


// Affichage : inclusion du css
$css = 'connexion.css';

// Affichage : inclusion du template
$pageTitle = "Connexion";
$template = 'connexion';
include '../templates/base.phtml';