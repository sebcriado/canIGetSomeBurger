<?php

namespace App\Service;

use App\Entity\User;
use App\Model\UserModel;

class UserSession
{
    const SESSION_KEY = 'user';


    public function __construct()
    {
        // Si la session n'est pas encore démarrée...
        if (session_status() == PHP_SESSION_NONE) {

            // ... on la démarre !
            session_start();
        }
    }

    public function register(User $user)
    {

        $_SESSION[self::SESSION_KEY] = $user;
    }

    public function getUser()
    {
        if (!isset($_SESSION[self::SESSION_KEY])) {
            return null;
        }


        $user = $_SESSION[self::SESSION_KEY];
        return $user;
    }
}
