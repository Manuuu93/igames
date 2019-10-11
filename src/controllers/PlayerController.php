<?php

namespace controllers;

use Models\Player;

class PlayerController extends BaseController
{
    /**
     *
     */
    public function actionIndex()
    {
        $this->view->players = Player::findAll();

        echo $this->view->render(dirname(__DIR__) . '/views/player/index.php');
    }

    /**
     * @param $id
     */
    public function actionShow($id)
    {
        $player = Player::findById($id);
        $this->view->player = $player;

        echo $this->view->render(dirname(__DIR__) . '/views/player/show.php');
    }
}
