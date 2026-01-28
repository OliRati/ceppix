<?php
/*
 *  Debugging helpers
 */

// Display formated message
function dg($data)
{
    echo '<pre style="background-color: black; color: white; padding: 1rem; margin: 1rem 0">';
    var_dump($data);
    echo "</pre>";
}

// Display formated message and die
function dd($data)
{
    dg($data);
    die();
}

/* Send redirection to a new web file */
/*
function redirect($url)
{
    header("Location: " . WEB_ROOT . $url);
    exit;
}
*/

/* Cleanup datas for safety */
function nettoyer($dataParam)
{
    $trimed_data = trim($dataParam);
    $cleaned_data = htmlspecialchars($trimed_data, ENT_QUOTES, 'UTF-8');
    return $cleaned_data;
}

/**
 * Vérifie si une date est valide selon un format donné
 *
 * @param string $date   La date à vérifier
 * @param string $format Le format attendu (ex: 'd/m/Y')
 * @return bool          true si valide, false sinon
 */
function isValidDate(string $date, string $format = 'd/m/Y'): bool
{
    // Crée un objet DateTime à partir du format
    $dt = DateTime::createFromFormat($format, $date);

    // Vérifie :
    // 1. Que la création a réussi
    // 2. Qu'il n'y a pas d'erreurs ou avertissements
    // 3. Que la date reformatée correspond exactement à l'entrée
    return $dt
        && $dt->format($format) === $date
        && empty(DateTime::getLastErrors()['warning_count'])
        && empty(DateTime::getLastErrors()['error_count']);
}

function showError($title, $text)
{
    ?>
    <style>
        @keyframes error-blink {
            0% {
                border: 0.4rem solid lightcoral;
            }

            50% {
                border: 0.4rem solid bisque;
            }
        }

        .error-frame {
            background-color: bisque;
            padding: 1rem;
            margin: 1rem 0;
            border: 0.4rem solid lightcoral;
            animation: error-blink 1s steps(1, start) infinite;
        }

        .error-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: lightcoral;
            margin-bottom: 1rem;
        }

        .error-text {
            font-size: 1rem;
            font-weight: 500;
            color: gray;
        }
    </style>

    <div class="error-frame">
        <div class="error-title"><?=  $title ?></div>
        <div class="error-text"><?= $text ?></div>
    </div>
    <?php
}
