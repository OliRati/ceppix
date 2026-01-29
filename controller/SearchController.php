<?php
class SearchController
{
    public static function formSearch()
    {
        global $twig;

        return $twig->render("search/search.html.twig", ["series" => ""]);
    }

    public static function resultSearch()
    {
        global $twig;

        if (isset($_POST["search-button"])) {
            $searchString = trim(strip_tags($_POST["search-text"]));

            $films = FilmController::getFilmsByCast($searchString);

            foreach ($films as $key => $film) {
                $filename = './public/assets/img/posters/' . $film['id_movies_full'] . '.jpg';

                if (file_exists($filename)) {
                    $films[$key]['img'] = $filename;
                } else {
                    $films[$key]['img'] = './public/assets/img/cover_not_available.jpg';
                }
            }

            return $twig->render("search/results.html.twig", ["films" => $films]);
        }

        return false;
    }
}
