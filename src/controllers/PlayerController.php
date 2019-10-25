<?php

namespace controllers;

use Models\Player;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\HtmlResponse;

class PlayerController extends BaseController
{
    /**
     * @return ResponseInterface
     */
    public function actionIndex(): ResponseInterface
    {
        $this->view->players = Player::findAll();

        return new HtmlResponse($this->view->render(dirname(__DIR__) . '/views/player/index.php'));
    }

    /**
     * @param $id
     * @return ResponseInterface
     */
    public function actionShow($id): ResponseInterface
    {
        $player = Player::findById($id);
        $this->view->player = $player;

        return new HtmlResponse($this->view->render(dirname(__DIR__) . '/views/player/show.php'));
    }
}
