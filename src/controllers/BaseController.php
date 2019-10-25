<?php

namespace controllers;

use components\View;
use models\Championship;

/**
 * Class BaseController
 * @package Controllers
 */
abstract class BaseController
{
    /**
     * @var View
     */
    protected $view;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $this->view = new View();
        $this->view->championships = Championship::findAll();
    }
}
