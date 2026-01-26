<?php

class FilmController
{
    public static function getFilmsByCast($cast)
    {
        $filmRepository = new FilmRepository();
        return ($filmRepository->getFilmsByCast($cast));
    }

    public static function getFilmsByYear($year)
    {
        
    }
}