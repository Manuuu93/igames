<?php

namespace controllers;

use models\Championship;

class ChampionshipController extends BaseController
{
    /**
     *
     */
    public function actionIndex()
    {
        echo $this->view->render(dirname(__DIR__) . '/views/championship/index.php');
    }

    /**
     * @param $id
     */
    public function actionShow($id)
    {
        $this->view->championship = Championship::findById($id);

        echo $this->view->render(sprintf("%s/views/championship/show.php", dirname(__DIR__)));
    }
}
