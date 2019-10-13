<?php

namespace controllers;

use models\Team;

class TeamController extends BaseController
{
    /**
     *
     */
    public function actionIndex()
    {
        $this->view->teams = Team::findAll();

        echo $this->view->render(dirname(__DIR__) . '/views/team/index.php');
    }

    /**
     * @param $id
     * @throws \Exception
     */
    public function actionShow($id)
    {
        $team = Team::findById($id);

        if ($team) {
            $this->view->team = $team;
        } else {
            throw new \Exception('Нет такой команды');
        }

        echo $this->view->render(dirname(__DIR__) . '/views/team/show.php');
    }
}
