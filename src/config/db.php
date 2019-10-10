<?php
return [
    'host'      => $_ENV['DB_HOST'] ?? 'localhost',
    'dbname'    => $_ENV['DB_NAME'] ?? 'igames',
    'user'      => $_ENV['DB_USER'] ?? 'root',
    'password'  => $_ENV['DB_PASSWORD'] ?? '',
];
