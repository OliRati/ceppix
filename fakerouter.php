<?php
require_once("./inc/autoloader.php");

// GET ctrl=user&meth=register

if (isset($_GET['ctrl']) && !empty($_GET['ctrl'])) {
    if ($_GET['ctrl'] === "user" && $_GET['meth'] === "register") {
        UserController::register();
    }

    if ($_GET['ctrl'] === "user" && $_GET['meth'] === "login") {
        UserController::login();
    }

    if ($_GET['ctrl'] === "user" && $_GET['meth'] === "logout") {
        UserController::logout();
    }
}

header('Location: ./index.php');
