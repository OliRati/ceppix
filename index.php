<?php

require_once("./inc/autoloader.php");
require_once("./model/User.php");

if (isset($_SESSION['userid']) && !empty($_SESSION['userid'])) { ?>
    <style>
        body {
            background-color: #303030;
            color: white;
        }

        header {
            display: flex;
            align-items: center;
            gap: 2rem;

            a {
                background-color: lightgreen;
                color: gray;
                padding: 0.5rem 3rem;
                margin: 0;
                text-decoration: none;
            }

            a:hover {
                background-color: lightseagreen;
                color: black;
                transition: all 0.3s ease-in-out;
                cursor: pointer;
            }
        }
    </style>
    <header>
        <div>
            Bonjour <?= $_SESSION['usernom'] ?>
        </div>
        <div>
            <img src="./public/assets/avatar/thumbnail/<?= $_SESSION['userid'] ?>.webp">
        </div>
        <div>
            <a href="./fakerouter.php?ctrl=user&meth=logout">Logout</a>
        </div>
    </header>
<?php
}

echo FortuneController::getFortuneString();

if (isset($_SESSION['userid']) && !empty($_SESSION['userid'])) {
    echo SearchController::formSearch();
    echo SearchController::resultSearch();

    // Afficher 10 films
    echo FilmController::getRandom10Films();

    // Afficher 10 Series de TVMaze
    echo SerieController::getRandom10SeriesFromTVMaze();
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

// json encoding
header('Content-Type: application/json');
echo json_encode($films);
*/