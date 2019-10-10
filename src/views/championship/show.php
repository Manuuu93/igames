<?php include_once dirname(__DIR__) . '/layouts/header.php';?>
    <div id="templatemo_content_column_two">
        <div class="column_two_section">
            <h1><?=$championship->title?></h1>
            <p><?=$championship->start_date?> - <?=$championship->end_date?></p>
            <p>Место проведения <?=$championship->place?></p>
            <div class="post_info">
                 Posted by <a href="http://www.templatemo.com" target="_parent">Admin</a>, <?=$championship->place?></div>
            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <th scope="col">Team</th>
                    <th scope="col">Points</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php foreach ($championship->results as $result): ?>
                    <th scope="row"><?=$result->team?></th>
                    <td><?=$result->points?></td>
                    <?php endforeach;?>
                </tr>
                </tbody>
            </table>
            <!--<p><?=$article->content?></p>-->
        </div>
    </div> <!-- end of column two -->
<?php include_once dirname(__DIR__) . '/layouts/footer.php';?>