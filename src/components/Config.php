<?php

namespace components;

class Config
{
    use Singleton;

    protected const CONFIG_DIR_NAME = 'config';
    /**
     * @var array
     */
    public $data = [];

    /**
     * Маппит файлы из каталога CONFIG_DIR_NAME
     * Config constructor.
     */
    protected function __construct()
    {
        $dir = sprintf("%s%s%s", dirname(__DIR__), DIRECTORY_SEPARATOR, self::CONFIG_DIR_NAME);
        $catalog = opendir($dir);
        while ($filename = readdir($catalog)) {
            if ($filename === '.' || $filename === '..') {
                continue;
            }
            $configName = str_replace('.php', '', $filename);

            $filename = sprintf("%s/%s", $dir, $filename);
            $this->data[$configName] = include($filename);
        }
        closedir($catalog);
    }
}
