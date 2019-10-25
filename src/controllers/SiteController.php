<?php

namespace controllers;

use models\Article;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\HtmlResponse;

class SiteController extends BaseController
{
    /**
     * @return ResponseInterface
     */
    public function actionIndex(): ResponseInterface
    {
        $this->view->articles = Article::findAll();

        return new HtmlResponse($this->view->render(dirname(__DIR__) . '/views/site/index.php'));
    }
}
