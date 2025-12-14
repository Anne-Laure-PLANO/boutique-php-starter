<?php

/**
 * Point d'entrée de l'application - Front Controller
 *
 * VERSION STARTER - Les apprenants doivent implémenter le backend
 * Pour l'instant, affiche juste des pages HTML statiques
 */

// Charger l'autoloader Composer
require_once __DIR__ . '/../vendor/autoload.php';

// Démarrer la session
session_start();

// Gestion des erreurs en développement
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Router ultra simple pour afficher le front-end
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = rtrim($uri, '/') ?: '/';

// Routes statiques pour voir le front-end
switch ($uri) {
    case '/':
        require __DIR__ . '/pages/index.html';
        break;

    case '/catalogue':
        require __DIR__ . '/pages/catalogue.html';
        break;

    case '/panier':
        require __DIR__ . '/pages/panier.html';
        break;

    case '/admin':
        require __DIR__ . '/pages/admin.html';
        break;

    default:
        // TODO JOUR 9 : Implémenter le vrai routeur avec Core\Router
        http_response_code(404);
        echo "<h1>404 - Page non trouvée</h1>";
        echo "<p>Les apprenants doivent implémenter le routeur (Jour 9)</p>";
        echo "<p><a href='/'>Retour à l'accueil</a></p>";
        break;
}
