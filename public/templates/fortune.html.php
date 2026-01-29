<style>
    .jock-container {
        background-color: #808080;
        padding: 1rem;
        border-radius : 1rem;
        border: 0.2rem solid lightgray;
        margin: 2rem;
    }

    .jock-title {
        color: lightgreen;
        font-size: 2rem;
    }

    .jock-content {
        color: lightblue;
        font-size: 1.5rem;
    }
</style>

<div class="jock-container">
    <div class="jock-title">Jock of the day :</div>
    <div class="jock-content"><?= FortuneController::getFortuneString() ?></div>
</div>
