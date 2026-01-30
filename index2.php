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
            font-size: 1.5rem;

            a {
                background-color: lightgreen;
                border-radius: 0.5rem;
                color: gray;
                padding: 0.5rem 3rem;
                margin: 0;
                text-decoration: none;
                font-size: 1.5rem;
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
        <div><a href="./index.php">Films</a></div>
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
    echo MusicSearchController::formSearch();
    echo MusicSearchController::resultSearch();
    
    // echo MusicController::getRandom10();
} else {
    include_once('./public/templates/register.html.php');
    include_once('./public/templates/login.html.php');
}
