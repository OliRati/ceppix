<?php

class MusicController
{
    public static function getMusicBy($search, $filter)
    {
        global $twig;

        $allowedfilters = ['artist', 'recording', 'genre'];
        if (!in_array($filter, $allowedfilters))
            return false;

        $options = [
            "http" => [
                "header" => "User-Agent: Ceppix/1.0 (contact@ceppix.org)\r\n"
            ]
        ];

        $context = stream_context_create($options);

        if ($filter === "genre")
            $url = "https://musicbrainz.org/ws/2/artist/?query=tag:$search&limit=20&fmt=json";
        else
            $url = "https://musicbrainz.org/ws/2/$filter/?query=$search&limit=20&fmt=json";

        $json = @file_get_contents($url, false, $context);
        if ($json === false)
            return false;

        $musics = json_decode($json, true);

        return $musics;
    }

    public static function getRandom10()
    {
        global $twig;

        $options = [
            "http" => [
                "header" => "User-Agent: Ceppix/1.0 (contact@ceppix.org)\r\n"
            ]
        ];

        $context = stream_context_create($options);

        // Ensure more that 1 second between calls1
        usleep(1100000);

        // No Random function is available so :
        // Find number of records
        $search = @file_get_contents("https://musicbrainz.org/ws/2/recording?query=a&limit=1&fmt=json", false, $context);
        if ($search === false)
            return $twig->render("errors.html.twig", ['errors' => ['Erreur de connexion à MusicBrainz']]);

        $data = json_decode($search, true);
        $total = $data['count'];

        $offset = rand(0, $total - 10);

        // Ensure more that 1 second between calls1
        usleep(1100000);

        $offset = 0;

        // Fetch 10 random records
        $url = "https://musicbrainz.org/ws/2/recording?query=a&limit=10&offset=$offset&fmt=json";

        $json = @file_get_contents($url, false, $context);
        if ($json === false)
            return $twig->render("errors.html.twig", ['errors' => ['Erreur de connexion à MusicBrainz']]);

        $musics = json_decode($json, true);

        return $twig->render("music/previewMusic.html.twig", ["musics" => $musics]);
    }
}
