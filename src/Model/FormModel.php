<?php

//1. Déclaration du namespace
namespace App\Model;

//2. Import de classes
use App\Core\AbstractModel;
use App\Entity\User;


class FormModel extends AbstractModel
{

    /**
     * Sélectionne tous les users
     */

    function getAllUsers()
    {
        $sql = 'SELECT * FROM user
        ORDER BY userId';

        $results = $this->db->getAllResults($sql);

        $users = [];
        foreach ($results as $result) {
            $users[] = new User($result);
        }

        return $users;
    }

    /**
     * Sélectionne un user à partir de son id
     */
    function getUserId(int $userId)
    {
        $sql = 'SELECT * 
            FROM user
            WHERE userId = ?';

        $result = $this->db->getOneResult($sql, [$userId]);

        if (empty($result)) {
            return null;
        }

        return new User($result);
    }
}
