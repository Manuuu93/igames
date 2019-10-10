<?php

namespace controllers;

use components\View;
use models\Championship;

abstract class BaseController
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
        $this->view->championships = Championship::findAll();
    }

    public function action($action)
	{
		return $this->$action();
	}
}