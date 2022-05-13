<?php

use Illuminate\Database\Seeder;

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
            StateTableSeeder::class,
            CityTableSeeder::class,
            EmpresaTableSeeder::class,
            MenuTableSeeder::class,
            PerfilTableSeeder::class,
            PermissionsTableSeeder::class,
            UserTableSeeder::class,
        ]);
    }
}
