<?php

namespace App\components;

trait Singleton
{
	protected static $instance;
	
	private function __construct()
	{
	}
	
	public static function instance() 
	{
		if (null === static::$instance) {
			return new static;
		}
		return static::$instance;
	}
}