<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => '1',
                'name' => 'Administrador',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$OGnfhCGrP1K6C5IlqnXy4.CD2VTAsQ8WpsjNdW6crIn4KnmRfsTEm',
                'api_token' => Str::random(60),
                'perfil_id' => '1',
                'empresa_id' => '1',
                'cpf' => '01234567890',
            )
        ));
    }
}
