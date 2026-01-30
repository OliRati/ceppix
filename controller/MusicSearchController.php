<?php
class MusicSearchController
{
    public static function formSearch()
    {
        global $twig;

        return $twig->render("music/search/searchMusic.html.twig", ["series" => ""]);
    }

    public static function resultSearch()
    {
        global $twig;

        if (isset($_POST["search-button"])) {
            $searchString = trim(strip_tags($_POST["search-text"]));
            $searchFilter = trim(strip_tags($_POST["filter"]));

            $results = MusicController::getMusicBy($searchString, $searchFilter);

            if ($results === false) {
                return $twig->render("errors.html.twig", ['errors' => ['Erreur : getMusicBy a eu un problème !']]);
            }

            if ($searchFilter === 'artist') {
                // Recording Check and add missing fields
                foreach ($results['artists'] as $key => $artist) {
                    if (!isset($artist['country'])) {
                        $results['artists'][$key]['country'] = 'Unknown';
                    }
                    if (!isset($artist['gender'])) {
                        $results['artists'][$key]['gender'] = 'Unknown';
                    }
                }

                return $twig->render("music/search/resultsArtist.html.twig", [
                    "search" => $searchString,
                    "filter" => $searchFilter,
                    "artists" => $results['artists']
                ]);
            } elseif ($searchFilter === 'recording') {
                // Recording Check and add missing fields
                foreach ($results['recordings'] as $key => $recording) {
                    if (!isset($recording['length'])) {
                        $results['recordings'][$key]['length'] = 'Unknown';
                    }

                    if (!isset($recording['first-release-date'])) {
                        $results['recordings'][$key]['first-release-date'] = 'Unknown';
                    }
                }

                return $twig->render("music/search/resultsRecording.html.twig", [
                    "search" => $searchString,
                    "filter" => $searchFilter,
                    "recordings" => $results['recordings']
                ]);
            } elseif ($searchFilter === 'genre') {
                // Recording Check and add missing fields
                foreach ($results['artists'] as $key => $artist) {
                    if (!isset($artist['country'])) {
                        $results['artists'][$key]['country'] = 'Unknown';
                    }
                    if (!isset($artist['gender'])) {
                        $results['artists'][$key]['gender'] = 'Unknown';
                    }
                }

                return $twig->render("music/search/resultsGenre.html.twig", [
                    "search" => $searchString,
                    "filter" => $searchFilter,
                    "artists" => $results['artists']
                ]);
            }
        }

        return false;
    }
}
