<?php

$routes = [
    'home' => [
        'path' => '/',
        'controller' => 'HomeController',
        'method' => 'index'
    ],
    'panier' => [
        'path' => '/panier',
        'controller' => 'PanierController',
        'method' => 'index'
    ],
    'login' => [
        'path' => '/login',
        'controller' => 'LoginController',
        'method' => 'index'
    ],
    'register' => [
        'path' => '/register',
        'controller' => 'RegisterController',
        'method' => 'index'
    ],
    'logout' => [
        'path' => '/logout',
        'controller' => 'LogoutController',
        'method' => 'index'
    ],
    'admin' => [
        'path' => '/admin',
        'controller' => 'AdminLoginController',
        'method' => 'index'
    ],
    'adminHome' => [
        'path' => '/adminHome',
        'controller' => 'AdminHomeController',
        'method' => 'index'
    ]

];

return $routes;
