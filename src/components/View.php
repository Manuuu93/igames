<?php

namespace components;

class View
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * @param $k
     * @param $v
     */
    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    /**
     * @param $k
     * @return mixed
     */
    public function __get($k)
    {
        return $this->data[$k];
    }

    /**
     * @param $k
     * @return bool
     */
    public function __isset($k)
    {
        return isset($data[$k]);
    }

    /**
     * @param $template
     * @return false|string
     */
    public function render($template)
    {
        ob_start();
        extract($this->data);
        include $template;
        $content = ob_get_clean();
        return $content;
    }
}
