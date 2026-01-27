<?php
require_once("./inc/autoloader.php");

// Pour appeller une methode ou une propriété static dans une class
UserController::register();
header("Location : ./index.php");
