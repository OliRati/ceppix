<?php

require_once("./inc/autoloader.php");
require_once("./model/User.php");

// require_once('./controller/UserController.php');
/*
UserController::getUserByEmail();
/ $films = FilmController::getFilmsByCast("eastwood");

header('Content-Type: application/json');
echo json_encode($films);
*/

if (isset($_SESSION['userid']) && !empty($_SESSION['userid'])) {
    echo '<div>Bonjour '.$_SESSION['usernom'].'<img src="./public/assets/avatar/thumbnail/'.$_SESSION['userid'].'.webp"></div>';
    echo '<a href="./fakerouter.php?ctrl=user&meth=logout">Logout</a>';

    // Afficher 10 films
    include_once('./public/templates/previewFilms.html.php');

    // Afficher 10 Series de TVMaze
    include_once('./public/templates/previewSeries.html.php');

} else {
    include_once('./public/templates/register.html.php');
    include_once('./public/templates/login.html.php');
}

/*<<<
require_once('./model/User.php');

var_dump("Hello");

// instanciation d'un objet $user à partit de la class User
// $user = new User;

$user = new User("Patrick", "patrick@abcdef.gh", "123456tyuhgdZERFDS&");

var_dump($user);

// $user->nom = "Bob";
$user->setNom("Bob");

// $user->email = "bob@bobby.fk"; impossible a utiliser avec private
$user->setEmail("bob@bobby.fk");
$user->setPwd("abcdefABCDEF?123456");

var_dump($user);

var_dump($user->getEmail(), $user->getNom());
*/