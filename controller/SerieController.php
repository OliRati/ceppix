<?php

class SerieController {
    
    public static function getRandom10SeriesFromTVMaze()
    {
        $results = [];
        while (count($results) < 10) {
            $id = rand(1, 60000);
            $json = file_get_contents("https://api.tvmaze.com/shows/$id");
            if ($json !== false) {
                $results[] = json_decode($json, true);
            }
        }

        return $results;
    }
}
