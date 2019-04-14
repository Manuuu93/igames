<?php include_once __DIR__ . '/../layouts/header.php';?>
   	<div id="templatemo_content_column_two">
        <?php foreach ($articles as $article): ?>
    	<div class="column_two_section">
			<h1><?=$article->title?></h1>
            <div class="post_info">
            	Posted by <a href="http://www.templatemo.com" target="_parent">Admin</a>, <?=$article->date?></div>
	    <img src="App/templates/images/templatemo_image_01.jpg" alt="image" />
            <p><?=$article->content?></p>
            <a href="/news/view/<?=$article->id?>" target="_parent">Читать целиком</a>
        </div>
        <?php endforeach;?>
    </div> <!-- end of column two -->
<?php include_once __DIR__ . '/../layouts/footer.php';?>