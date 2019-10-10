<?php

namespace controllers;

use models\Championship;

class ChampionshipController extends BaseController
{
    public function actionIndex()
    {
        echo $this->view->render(dirname(__DIR__) . '/views/championship/index.php');
    }

    public function actionShow($id)
    {
        $this->view->championship = Championship::findById($id);

        echo $this->view->render(dirname(__DIR__) .'/views/championship/show.php');
    }
}