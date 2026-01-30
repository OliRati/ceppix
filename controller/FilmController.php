<?php

class FilmController
{
    public static function getFilmsByCast($cast)
    {
        $filmRepository = new FilmRepository();
        return ($filmRepository->getFilmsByCast($cast));
    }

    public static function getFilmsBy($searchString, $filter )
    {
        $filmRepository = new FilmRepository();
        return ($filmRepository->getFilmsBy($searchString, $filter));
    }

    public static function getFilmsByYear($year)
    {

    }

    public static function getRandom10Films()
    {
        global $twig;

        $filmRepository = new FilmRepository();

        $films = $filmRepository->getRandom10Films();

        foreach ($films as $key => $film) {
            $filename = './public/assets/img/posters/' . $film['id_movies_full'] . '.jpg';

            if (file_exists($filename)) {
                $films[$key]['img'] = $filename;
            } else {
                $films[$key]['img'] = './public/assets/img/cover_not_available.jpg';
            }
        }

        return $twig->render("previewFilms.html.twig",["films" => $films]);
    }
}