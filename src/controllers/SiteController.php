<?php

namespace controllers;

use models\Article;

class SiteController extends BaseController
{
    /**
     *
     */
    public function actionIndex()
    {
        $this->view->articles = Article::findAll();

        echo $this->view->render(dirname(__DIR__) . '/views/site/index.php');
    }
}
