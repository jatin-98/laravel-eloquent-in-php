<?php

namespace Src;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    public function __construct()
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver'        => $_ENV['DB_DRIVER'],
            'host'          => $_ENV['DB_HOST'],
            'database'      => $_ENV['DB_DATABASE'],
            'username'      => $_ENV['DB_USER'],
            'password'      => $_ENV['DB_PASSWORD'],
            'charset'       => 'utf8',
            'collation'     => 'utf8_unicode_ci',
            'prefix'        => '',
        ]);

        $capsule->setAsGlobal();

        // Setting up the Eloquent ORM… 
        $capsule->bootEloquent();
    }

    public static function applyMigrations()
    {
        self::createMigrationsTable();

        $appliedMigrations = self::getAppliedMigrations();
        $migrationFiles = scandir(dirname(__DIR__) . '/migrations');
        $notMigratedMigrations = array_diff($migrationFiles, $appliedMigrations);
        $newMigrations = [];

        foreach ($notMigratedMigrations as $migration) {
            if ($migration === '.' || $migration === '..') {
                continue;
            }

            include dirname(__DIR__) . "/migrations/$migration";

            self::migrationLog("Migrating $migration");
            $newMigrations[] = $migration;
        }

        if (!empty($newMigrations)) {
            self::saveMigratedMigrationLogs($newMigrations);
        } else {
            self::migrationLog("Nothing to Migrate");
        }
    }

    public static function createMigrationsTable()
    {
        if (!Capsule::schema()->hasTable('migrations')) {
            Capsule::schema()->create('migrations', function ($table) {
                $table->increments('id');
                $table->string('migration')->unique();
                $table->timestamps();
            });
        }
        return;
    }

    public static function getAppliedMigrations()
    {
        return Capsule::table('migrations')->pluck('migration')->toArray();
    }

    public static function migrationLog($message)
    {
        echo sprintf('[%s] %s', date("Y-m-d h:i:s"), $message) . PHP_EOL;
    }

    public static function saveMigratedMigrationLogs(array $migrations)
    {
        $str = implode(",", array_map(fn ($mp) => "('$mp')", $migrations));
        return Capsule::select("INSERT INTO migrations (migration) VALUES $str");
    }
}
