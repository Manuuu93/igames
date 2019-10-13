<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8; lang=rus" />
    <title>Free Design Template - Free CSS Template</title>
    <meta name="keywords" content="free design template, CSS template, HTML website" />
    <meta name="description" content="Free Design Template, Free CSS Website, XHTML CSS layout" />
    <link href="/css/templatemo_style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<!--  Download Free CSS Templates from www.templatemo.com  -->
<div id="templatemo_header_panel">
    <div id="templatemo_header_section">
        <div id="templatemo_title_section">iGames Blog</div>
        <div id="tagline">Интеллектуальные игры</div>
    </div>
</div> <!-- end of haeder -->

<div id="templatemo_menu_panel">
    <div id="templatemo_menu_section">
        <ul>
            <li><a href="/" class="current">Главная</a></li>
            <li><a href="/championships">Соревнования</a></li>
            <li><a href="/teams">Команды</a></li>
            <li><a href="/players">Игроки</a></li>
        </ul>
    </div>
</div> <!-- end of menu -->

<div id="templatemo_content">

    <div id="templatemo_content_column_one">

        <div class="column_one_section">
            <h1>Чемпионаты</h1>
            <ul>
                <?php foreach ($championships as $ch) : ?>
                    <li><a href="#"><?=$ch->title?></a></li>
                <?php endforeach;?>
            </ul>
        </div>

    </div> <!-- end of column one -->