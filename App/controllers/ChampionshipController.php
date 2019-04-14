<?php

namespace App\controllers;

use App\models\Championship;

class ChampionshipController extends BaseController
{
    public function actionIndex()
    {
        echo $this->view->render(__DIR__ . '/../views/championship/index.php');
    }

    public function actionShow($id)
    {
        $this->view->championship = Championship::findById($id);

        echo $this->view->render(__DIR__ .'/../views/championship/show.php');
    }
}