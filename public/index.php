<?php

// Inclusion de l'autoloader de composer
require '../vendor/autoload.php';

// Démarrage de la session
session_start();

// Inclusion de la config
require '../app/config.php';

// Inclusion des dépendances
require '../lib/functions.php';


// Récupération du path
$path = str_replace(BASE_URL, '', $_SERVER['REQUEST_URI']);
$path = str_replace('/index.php', '', $path);
$path = explode('?', $path)[0];


if ($path == '') {
    $path = '/';
}

// ROUTING


// On va chercher dans le fichier routes.php le tableau de routes
$routes = require '../app/routes.php';

// On crée une const ROUTES pour avoir accès à nos routes partout
define('ROUTES', $routes);

$className = null;
$method = null;

foreach ($routes as $route) {
    if ($path == $route['path']) {
        $className = $route['controller'];
        $method = $route['method'];
        break;
    }
}

// Si on n'a pas trouvé le path dans les routes... => erreur 404
if ($className == null) {
    http_response_code(404);
    echo 'Page introuvable';
    exit;
}

// Ici j'ai trouvé ma route !
try {
    $className = "App\\Controller\\$className";
    $controller = new $className();
    $controller->$method();
} catch (Exception $exception) {
    echo $exception->getMessage();
    exit;
}
