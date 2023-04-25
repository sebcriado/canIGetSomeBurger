<?php

namespace App\Controller;

class LogoutController
{

    public function index()
    {

        if (isConnected()) {
            $_SESSION = [];
            session_destroy();
            header('Location: ' . constructUrl('home'));
        }
    }
}
