<?php

//1. Déclaration du namespace
namespace App\Model;

//2. Import de classes
use App\Core\AbstractModel;
use App\Entity\User;


class UserModel extends AbstractModel
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

    // Récupère les données d'un utilisateur
    function getUser($email)
    {
        $sql = 'SELECT * FROM user WHERE email = ?';
        return $this->db->getOneResult($sql, [$email]);
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

    // Ajoute un nouvel utilisateur
    function addNewUser(string $firstname, string $lastname, string $email, string $password, string $phone, string $adress)
    {
        $role = "user";
        $sql = 'INSERT INTO user(firstname, lastname, email, password, phone, address, role)
                VALUES (?, ?, ?, ?, ?, ?, ?)';
        $this->db->prepareAndExecute($sql, [$firstname, $lastname, $email, $password, $phone, $adress, $role]);
    }

    // Supprime un utilisateur
    function deleteUser(int $userId)
    {
        $sql = 'DELETE FROM user WHERE userId = ?';

        $this->db->prepareAndExecute($sql, [$userId]);
    }

    // Modifie un utilisateur
    function modifyUser(string $firstname, string $lastname, string $email, string $phone, string $address, int $userId)
    {

        $sql = 'UPDATE user SET firstname = ?, lastname = ?, email = ?, phone = ?, address = ? WHERE userId = ?';

        $this->db->prepareAndExecute($sql, [$firstname, $lastname, $email, $phone, $address, $userId]);
    }
}
