<?php

namespace models;

use components\Db;

class Championship extends Model
{

    public const TABLE = 'championships';

    public $title;
    public $start_date;
    public $end_date;
    public $place;
    public $article_id;

    /**
     * @param $name
     * @return array
     */
    public function __get($name)
    {
        if ('results' == $name) {
            $sql = 'select t.name team, r.points points from ' . Result::TABLE . ' r join ' . Team::TABLE .
                ' t on r.team_id = t.id where champ_id = :champ_id';

            $db = Db::instance();

            return $db->query($sql, Result::class, [':champ_id' => $this->id]);
        }
    }
}
