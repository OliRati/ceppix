<style>
    body {
        background-color: #303030;
        color: white;
    }

    a {
        display: inline-block;
        background-color: lightskyblue;
        border-radius: 1rem;
        color: lightcyan;
        padding: 1rem 2.5rem;
        margin: 1rem;
        font-size: 2rem;
    }

    .film-container {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .film-card {
        background-color: #E0E0E0;
        border-radius: 0.5rem;
        padding: 1rem;
        width: 16rem;

        display: flex;
        flex-direction: column;
        justify-content: space-between;

        .title {
            font-size: 1.2rem;
            font-weight: 600;
            color: black;
        }

        .plot, .year, .cast, .directors {
            font-size: 1rem;
            color: #303030;

            span {
                font-weight: 600;
                font-size: 1.1rem;
            }
        }
    }

    .film-cover {
        img {
            width: 100%;
        }
    }
</style>
<div class="film-container">
    <?php foreach (FilmController::getRandom10Films() as $film) { ?>
        <div class="film-card">
            <div class="film-card-top">
                <p class="title"><?= $film['title'] ?></p>
                <hr>
                <p class="plot"><span>Résumé :</span> <?= $film['plot'] ?></p>
                <p class="year"><span>Date :</span> <?= $film['year'] ?></p>
                <p class="cast"><span>Acteur(s) :</span> <?= $film['cast'] ?></p>
                <p class="directors"><span>Producteur(s) :</span> <?= $film['directors'] ?></p>
            </div>
            <div class="film-card-bottom">
                <div class="film-cover"><img src="<?= $film['img'] ?>" alt="<?= 'cover ' . $film['title'] ?>"></div>
            </div>
        </div>
    <?php } ?>
</div>