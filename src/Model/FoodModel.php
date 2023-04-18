<?php
//1. Déclaration du namespace
namespace App\Model;

//2. Import de classes
use App\Core\AbstractModel;
use App\Entity\Food;

class FoodModel extends AbstractModel
{
    /**
     * Sélectionne tous les plats
     */

    function getAllFoods()
    {
        $sql = 'SELECT * FROM food
        ORDER BY foodId';

        $results = $this->db->getAllResults($sql);

        $foods = [];
        foreach ($results as $result) {
            $foods[] = new Food($result);
        }

        return $foods;
    }
}
