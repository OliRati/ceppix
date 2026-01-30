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

    public function getFilmsByYear($year)
    {
        global $pdo;
        $req = $pdo->prepare("SELECT * FROM movies_full WHERE year = :year");
        $req->execute([':year' => $year]);

        return $req->fetchAll();
    }

    public function getFilmsBy($searchString, $filter)
    {
        global $pdo;

        $allowed = ["cast", "genres", "directors", "year"];
        if (!in_array($filter, $allowed))
            return [];

        $req = $pdo->prepare("SELECT * FROM movies_full WHERE $filter LIKE :search");
        $req->execute([':search' => "%$searchString%"]);

        return $req->fetchAll();
    }

    // Recherche de 10 films random

    public function getRandom10Films()
    {
        global $pdo;
        $req = $pdo->prepare("SELECT * from movies_full ORDER BY RAND() LIMIT 10");
        $req->execute();

        return $req->fetchAll();
    }
}
