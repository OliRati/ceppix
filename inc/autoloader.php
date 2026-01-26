<?php

require_once("./inc/pdo.php");

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
