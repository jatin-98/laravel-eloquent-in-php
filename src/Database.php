<?php

namespace Src;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    public function __construct(array $config = [])
    {
        $capsule = new Capsule;

        $dbConfig = empty($config) ? [
            'driver'        => $_ENV['DB_DRIVER'] ?? 'mysql',
            'host'          => $_ENV['DB_HOST'] ?? '127.0.0.1',
            'database'      => $_ENV['DB_DATABASE'] ?? 'forge',
            'username'      => $_ENV['DB_USER'] ?? 'forge',
            'password'      => $_ENV['DB_PASSWORD'] ?? '',
            'charset'       => 'utf8',
            'collation'     => 'utf8_unicode_ci',
            'prefix'        => '',
        ] : $config;

        $capsule->addConnection($dbConfig);

        $capsule->setAsGlobal();

        // Setting up the Eloquent ORM… 
        $capsule->bootEloquent();
    }
}
