<?php

namespace controllers;

use models\Team;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\HtmlResponse;

class TeamController extends BaseController
{
    /**
     * @return ResponseInterface
     */
    public function actionIndex(): ResponseInterface
    {
        $this->view->teams = Team::findAll();

        return new HtmlResponse($this->view->render(dirname(__DIR__) . '/views/team/index.php'));
    }

    /**
     * @param $id
     * @return ResponseInterface
     * @throws \Exception
     */
    public function actionShow($id): ResponseInterface
    {
        $team = Team::findById($id);

        if ($team) {
            $this->view->team = $team;
        } else {
            throw new \Exception('Нет такой команды');
        }

        return new HtmlResponse($this->view->render(dirname(__DIR__) . '/views/team/show.php'));
    }
}
