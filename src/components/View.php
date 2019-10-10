<?php

namespace components;

class View
{
	protected $data = [];

	public function __set($k, $v)
	{
		$this->data[$k] = $v;
	}

	public function __get($k)
	{
		return $this->data[$k];
	}

	public function __isset($k) {
		return isset($data[$k]);
	}

	public function render($template)
	{
		ob_start();
		extract($this->data);
		include $template;
		$content = ob_get_clean();
		return $content;
	}
} 