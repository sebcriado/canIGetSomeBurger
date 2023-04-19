<?php

$formModel = new App\Model\FormModel;
$users = $formModel->getAllUsers();

// Affichage : inclusion du css
$css = 'inscription.css';

// Affichage : inclusion du template
$pageTitle = 'Inscription';
$template = 'inscription';
include '../templates/base.phtml';
