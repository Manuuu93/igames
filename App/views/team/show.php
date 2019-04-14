<?php include_once __DIR__ . '/../layouts/header.php';?>
<div>
    <div id="templatemo_content_column_two">
        <h2><?=$team->name?></h2>
        <p>Команда образована <?=$team->birthday?></p>
        <hr>
        <h3>Игроки</h3>
        <?php foreach ($team->players as $player):?>
            <p><?=$player->name?> <a href="/players/show/<?=$player->id?>">Профиль</a></p>
            <p><?=$player->birthday?></p>
        <?php endforeach;?>
    </div> <!-- end of column two -->
</div>
<?php include_once __DIR__ . '/../layouts/footer.php';?>
