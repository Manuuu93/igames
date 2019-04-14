<?php

namespace App\controllers;

use App\models\Article;

class SiteController extends BaseController
{
    public function actionIndex()
    {
        $this->view->articles = Article::findAll();

        echo $this->view->render('App/views/site/index.php');
    }
}