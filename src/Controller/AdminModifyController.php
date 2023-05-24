<?php

namespace App\Controller;

use App\Model\FoodModel;
use App\Entity\Food;
use App\Service\AdminFiles;

class AdminModifyController
{


    public function index()
    {
        $foodId = $_GET['foodId'];

        $foodModel = new FoodModel();
        $food = $foodModel->getFoodId($foodId);

        $title = $food->getTitle();
        // $image = $food->getImage();
        $description = $food->getDescription();
        $price = $food->getPrice();


        if (!empty($_POST)) {

            $title = $_POST['title'];
            $image = $_FILES['image'];
            $description = $_POST['description'];
            $price = $_POST['price'];

            $filename = $food->getImage();
            if ($filename && file_exists('images/' . $filename)){
                unlink('images/' . $filename);
            }

            $adminFiles = new AdminFiles;
            $fileName = $adminFiles->uploadFile($image['name'], $image['tmp_name'], 'images');
            $foodModel->modifyFood($title, $fileName, $description, $price, $foodId);

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
