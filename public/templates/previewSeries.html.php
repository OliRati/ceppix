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
        color: #303030;
        border-radius: 0.5rem;
        padding: 1rem;
        width: 16rem;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.9), 0 6px 20px 0 rgba(0, 0, 0, 0.9);

        display: flex;
        flex-direction: column;
        justify-content: space-between;

        p {
            margin: 0.5rem 0;
        }

        .title {
            font-size: 1.2rem;
            font-weight: 600;
            color: black;
        }

        .plot, .year, .cast, .directors, .summary {
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

<h2>List of 10 series from TVMaze API</h2>

<div class="film-container">
    <?php foreach (SerieController::getRandom10SeriesFromTVMaze() as $film) { ?>
        <div class="film-card">
            <div class="film-card-top">
                <p class="title"><?= $film['name'] ?></p>
                <hr>
                <p class="plot"><span>Type :</span> <?= $film['type'] ?></p>
                <p class="year"><span>Language :</span> <?= $film['language'] ?></p>
                <p class="summary"><span>Résumé :</span> <?= $film['summary'] ?></p>
            </div>
            <div class="film-card-bottom">
                <div class="film-cover"><img src="<?= $film['image']['medium'] ?>" alt=""></div>
            </div>
        </div>
    <?php } ?>
</div>
