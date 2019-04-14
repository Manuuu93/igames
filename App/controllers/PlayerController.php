<?php

namespace App\controllers;
use App\Models\Player;

class PlayerController extends BaseController
{
    public function actionIndex()
    {
        $this->view->players = Player::findAll();

        echo $this->view->render('App/views/player/index.php');
    }

    public function actionShow($id)
    {
        $player = Player::findById($id);
        $this->view->player = $player;

        echo $this->view->render('App/views/player/show.php');
    }

}