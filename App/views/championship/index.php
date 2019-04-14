<?php include_once __DIR__ . '/../layouts/header.php';?>
    <div id="templatemo_content_column_two">
        <?php foreach ($championships as $ch): ?>
            <div class="column_two_section">
                <h1><?=$ch->title?></h1>
                <p><?=$ch->start_date?> - <?=$ch->end_date?></p>
                <p>Место проведения <?=$ch->place?></p>
                <div class="post_info">
                    Posted by <a href="http://www.templatemo.com" target="_parent">Admin</a>, <?=$ch->place?></div>
                <img src="App/templates/images/templatemo_image_01.jpg" alt="image" />
                <a href="/championships/show/<?=$ch->id?>" target="_parent">Смотреть целиком</a>-->
            </div>
        <?php endforeach;?>
    </div>
<?php include_once __DIR__ . '/../layouts/footer.php';?>