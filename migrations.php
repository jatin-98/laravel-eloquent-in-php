<?php

use Src\Database;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/bootstrap.php';


Database::applyMigrations();
