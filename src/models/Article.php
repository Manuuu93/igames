<?php

namespace models;

use components\Db;

/**
 * Class Article
 *
 * @package Models
 */
class Article extends Model
{
    public const TABLE = 'articles';

    public $title;
    public $content;
    public $date;

    /**
     *
     * @return mixed
     */
    public static function findLast()
    {
        $db = Db::instance();
        $sql = sprintf('select * from %s where date = (select max(date) from %s)', static::TABLE, static::TABLE);
        return $db->query($sql, static::class)[0];
    }
}
