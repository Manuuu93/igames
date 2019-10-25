<?php

namespace controllers;

use models\Championship;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\HtmlResponse;

class ChampionshipController extends BaseController
{
    /**
     * @return ResponseInterface
     */
    public function actionIndex(): ResponseInterface
    {
        return new HtmlResponse($this->view->render(dirname(__DIR__) . '/views/championship/index.php'));
    }

    /**
     * @param $id
     * @return ResponseInterface
     */
    public function actionShow($id): ResponseInterface
    {
        $this->view->championship = Championship::findById($id);

        return new HtmlResponse($this->view->render(dirname(__DIR__) . '/views/championship/show.php'));
    }
}
