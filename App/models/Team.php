<?php

namespace App\models;

use App\components\Db;

class Team extends Model
{
    const TABLE = 'teams';

    public $name;
    public $birthday;

    public function __get($name)
    {
        if('players' == $name) {
            $db = Db::instance();
            $sql = 'select * from players where team_id = :team_id';

            return $db->query($sql, static::class, [':team_id' => $this->id]);
        };
    }
}