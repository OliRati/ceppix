<?php

class FilmRepository extends MainRepository
{
    // recherche de films par acteur

    public function getFilmsByCast($cast)
    {
        global $pdo;
        $req = $pdo->prepare("SELECT * FROM movies_full WHERE cast LIKE :cast");
        $req->execute([':cast' => "%$cast%"]);

        return $req->fetchAll();
    }
}