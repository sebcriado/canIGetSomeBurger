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

    /**
     * Sélectionne un plat à partir de son id
     */
    function getFoodId(int $foodId)
    {
        $sql = 'SELECT * 
            FROM food
            WHERE foodId = ?';

        $result = $this->db->getOneResult($sql, [$foodId]);

        if (empty($result)) {
            return null;
        }

        return new Food($result);
    }

    // Ajoute un nouveau produit
    function addNewFood(string $title, string $image, string $description, string $price)
    {
        $sql = 'INSERT INTO food(title, image, description, price)
                VALUES (?, ?, ?, ?)';
        $this->db->prepareAndExecute($sql, [$title, $image, $description, $price]);
    }

    // Supprime un produit
    function deleteFood(int $foodId)
    {
        $sql = 'DELETE FROM food WHERE foodId = ?';

        $this->db->prepareAndExecute($sql, [$foodId]);
    }

    function modifyFood(string $title, string $image, string $description, string $price, int $foodId)
    {

        $sql = 'UPDATE food SET title = ?, image = ?, description = ?, price = ? WHERE foodId = ?';

        $this->db->prepareAndExecute($sql, [$title, $image, $description, $price, $foodId]);
    }
}
