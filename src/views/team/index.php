<?php include_once dirname(__DIR__) . '/layouts/header.php';?>
<div>
    <div id="templatemo_content_column_two">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Команда</th>
                <th scope="col">Дата образования</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($teams as $team): ?>
                <tr>
                    <th><?=$team->id?></th>
                    <td><a href='/teams/show/<?=$team->id?>'><?=$team->name?></a></td>
                    <td><?=$team->birthday?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div> <!-- end of column two -->
</div>
<?php include_once dirname(__DIR__) . '/layouts/footer.php';?>
