<?php

namespace Database\Seeders;

use App\Models\Role;
use Database\Seeders\RoleTableSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\CategoriesTableSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleTableSeeder::class,
            UsersTableSeeder::class,
            CategoriesTableSeeder::class
        ]);
    }
}
