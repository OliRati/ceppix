<?php

class SerieController
{

    public static function getRandom10SeriesFromTVMaze()
    {
        global $twig;

        $results = [];
        while (count($results) < 10) {
            $id = rand(1, 60000);
            $json = @file_get_contents("https://api.tvmaze.com/shows/$id");
            if ($json !== false) {
                $results[] = json_decode($json, true);
            }
        }

        foreach ($results as $key => $value) {
            if (
                empty($value['image'])
                || !@file_get_contents($value['image']['medium'])
            ) {
                $results[$key]['image']['medium'] = './public/assets/img/default_series.webp';
            }

            if ( !empty($value['network']) ) {
                $results[$key]['network']['name'] = 'inconnu';
            }                
        }

        return $twig->render("previewSeries.html.twig",["series" => $results]);
    }
}
