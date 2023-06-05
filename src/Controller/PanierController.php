<?php

namespace App\Controller;


class PanierController
{

    public function index()
    {


        // Affichage : inclusion du css
        $css = 'panier.css';

        // Affichage : inclusion du template
        $pageTitle = "Panier";
        $template = 'panier';
        include '../templates/base.phtml';
    }
}
