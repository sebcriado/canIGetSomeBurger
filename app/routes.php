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
    ]
];

return $routes;
