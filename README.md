# Laravel Eloquent in PHP

A lightweight wrapper to easily bootstrap and use Laravel's Eloquent ORM in any PHP project outside of the Laravel framework.

## Installation

To use this package locally without publishing it, you can clone it directly into your project and link it using Composer's path repository feature.

1. Clone the repository into your project (for example, into a `packages/` directory):
   ```bash
   mkdir packages
   cd packages
   git clone https://github.com/jatin-98/laravel-eloquent-in-php.git
   cd ..
   ```

2. Add a `path` repository to your project's `composer.json` to point to the cloned folder:
   ```json
   {
       "repositories": [
           {
               "type": "path",
               "url": "packages/laravel-eloquent-in-php"
           }
       ]
   }
   ```

3. Finally, require the package:
   ```bash
   composer require jatin/eloquent-wrapper
   ```
   *Composer will now automatically symlink the package into your `vendor/` directory and configure the autoloader.*

## Usage

### 1. Initialize the Database

You can initialize Eloquent anywhere in your application by instantiating the `Src\Database` class. 

You can pass your database configuration directly to the constructor:

```php
use Src\Database;

require_once __DIR__ . '/vendor/autoload.php';

$config = [
    'driver'    => 'mysql',
    'host'      => '127.0.0.1',
    'database'  => 'my_database',
    'username'  => 'root',
    'password'  => 'secret',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
];

$db = new Database($config);
```

If you don't pass a configuration array, it will automatically look for the following `$_ENV` variables (often populated via `vlucas/phpdotenv`):
- `DB_DRIVER`
- `DB_HOST`
- `DB_DATABASE`
- `DB_USER`
- `DB_PASSWORD`

### 2. Using Models

Once the database is initialized, you can create standard Eloquent models extending `Illuminate\Database\Eloquent\Model` and use them anywhere in your code.

```php
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'email'];
}

// Fetch users
$users = User::all();
```
