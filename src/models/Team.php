<?php

namespace models;

use components\Db;

class Team extends Model
{
    public const TABLE = 'teams';

    public $name;
    public $birthday;

    /**
     * @param $name
     * @return mixed
     */
    public function __get(string $name)
    {
        if ('players' === $name) {
            $db = Db::instance();
            $sql = 'select * from players where team_id = :team_id';

            return $db->query($sql, static::class, [':team_id' => $this->id]);
        };
    }
}
