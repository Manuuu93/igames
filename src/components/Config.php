<?php

namespace components;

class Config
{
	use Singleton;
	public $data = [];

	protected function __construct()
	{
		$this->data['db'] = [
		    'host' => 'localhost',
            'dbname' => 'igames',
            'user' => 'root',
            'password' => ''
        ];
	}
}