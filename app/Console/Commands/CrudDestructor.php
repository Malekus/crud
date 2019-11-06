<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CrudDestructor extends Command
{

    protected $signature = 'crud:destructor {name : Class (singular) for example User}';

    protected $description = 'Delete CRUD operations';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $name = ucfirst($this->argument('name'));
        !file_exists(app_path("/Http/Controllers/{$name}Controller.php")) ?: unlink(app_path("/Http/Controllers/{$name}Controller.php"));
        !file_exists(app_path("/{$name}.php")) ?: unlink(app_path("/{$name}.php"));
        !file_exists(app_path("/Http/Requests/{$name}Request.php")) ?: unlink(app_path("/Http/Requests/{$name}Request.php"));
        !file_exists(app_path("../database/factories/{$name}Factory.php")) ?: unlink(app_path("../database/factories/{$name}Factory.php"));
        !file_exists(app_path("../database/seeds/{$name}TableSeeder.php")) ?: unlink(app_path("../database/seeds/{$name}TableSeeder.php"));
        !file_exists(app_path("/Http/Resources/{$name}.php")) ?: unlink(app_path("/Http/Resources/{$name}.php"));
        !file_exists(app_path("/Http/Resources/{$name}.php")) ?: unlink(app_path("/Http/Resources/{$name}.php"));
    }
}

