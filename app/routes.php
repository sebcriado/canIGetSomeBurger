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
    ],
    'deleteFood' => [
        'path' => '/deleteFood',
        'controller' => 'DeleteFoodController',
        'method' => 'index'
    ],
    'deleteUser' => [
        'path' => '/deleteUser',
        'controller' => 'DeleteUserController',
        'method' => 'index'
    ],
    'adminModify' => [
        'path' => '/adminModify',
        'controller' => 'AdminModifyController',
        'method' => 'index'
    ],
    'userModify' => [
        'path' => '/userModify',
        'controller' => 'UserModifyController',
        'method' => 'index'
    ]

];

return $routes;
