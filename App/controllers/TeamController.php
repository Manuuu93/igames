<?php

namespace App\controllers;

use App\models\Team;

class TeamController extends BaseController
{
    public function actionIndex()
    {
        $this->view->teams = Team::findAll();

        echo $this->view->render('App/views/team/index.php');
    }

    public function actionShow($id)
    {
        $team = Team::findById($id);

        if($team) {
            $this->view->team = $team;
        } else {
            throw new \Exception('Нет такой команды');
        }

        echo $this->view->render('App/views/team/show.php');
    }
}