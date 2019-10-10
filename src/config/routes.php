<?php

return [
    '^$' => 'site/index',
    '^teams$' => 'team/index',
    '^teams/show/([0-9]+)$' => 'team/show/$1',
    '^players$' => 'player/index',
    '^players/show/([0-9]+)$' => 'player/show/$1',
    '^championships$' => 'championship/index',
    '^championships/show/([0-9]+)$' => 'championship/show/$1',
];