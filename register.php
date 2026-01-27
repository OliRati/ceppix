<?php
require_once("./inc/autoloader.php");

// Pour appeller une methode ou une propriété static dans une class
if (UserController::register()) {
    header("Location: ./index.php");
}
?>
<h1 style="color: lightcoral">Erreur enregistrement utilisateur !!!</h1>
<?php
include_once('./public/templates/register.html.php');
