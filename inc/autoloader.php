<?php

session_start();

require_once("./inc/pdo.php");
require_once("./inc/helper.php");

// Add Autoload from composer
require_once('./vendor/autoload.php');

/*
 * Twig instantiation
 */

// Configure the filesystem loader
$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/../public/templates');

// Add namespace for shared templates
$loader->addPath(__DIR__ . '/../public/templates', 'layouts');

// Initialize environment with production settings
//     'cache' => __DIR__ . '/../var/cache/twig',
$twig = new \Twig\Environment($loader, [
    'cache' => false,
    'auto_reload' => true, // Check for template changes (disable in production)
    'strict_variables' => true, // Throw errors for undefined variables
    'autoescape' => 'html', // Default escaping strategy
]);

// Add global variables available in all templates
$twig->addGlobal('app_name', 'My Application');
$twig->addGlobal('current_year', date('Y'));

/*
 * Our Custom auto loader
 */

spl_autoload_register(function ($class) {
    $path = __DIR__."/..";

    $classFolder = [
        'controller',
        'model',
        'repository'
    ];

    foreach ($classFolder as $key => $value) {
        if (file_exists($path . "/" . $value . "/" . $class . '.php')) {
            include($path . "/" . $value . "/" . $class . '.php');
            return;
        }
    }

});
