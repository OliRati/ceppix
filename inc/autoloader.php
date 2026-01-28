<?php

session_start();

require_once("./inc/pdo.php");
require_once("./inc/helper.php");

// Add Autoload from composer
require_once('./vendor/autoload.php');

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
