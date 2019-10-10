<?php include_once __DIR__ . '/../layouts/header.php';?>
<div>
    <div id="templatemo_content_column_two">
        <?php foreach ($players as $player):?>
        <h2><?=$player->name?></h2>
        <p><?=$player->birthday?></p>
        <hr>
        <?php endforeach;?>
    </div> <!-- end of column two -->
</div>
<?php include_once __DIR__ . '/../layouts/footer.php';?>
