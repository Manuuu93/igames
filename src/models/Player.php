<?php

namespace models;

class Player extends Model
{
    const TABLE = 'players';

    public $name;
    public $birthday;
    public $team_id;
}