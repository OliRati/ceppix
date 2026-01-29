<?php
class FortuneController
{
    public static function getFortuneString()
    {
        global $twig;

        $json = @file_get_contents("https://api.chucknorris.io/jokes/random");
        if ($json !== false) {
            $result = json_decode($json, true);
        }

        return $twig->render("footer.html.twig", ["joke" => $result['value']]);
    }
}