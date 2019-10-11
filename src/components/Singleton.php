<?php

namespace components;

trait Singleton
{
    protected static $instance;

    /**
     * Singleton constructor.
     */
    private function __construct()
    {
    }

    /**
     * @return Singleton
     */
    public static function instance()
    {
        if (null === static::$instance) {
            return new static();
        }
        return static::$instance;
    }
}
