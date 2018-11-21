<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('usuarios')->insert([
            'username' => 'cesar10garcia1',
            'email' => 'cesar10garcia1@gmail.com',
            'password' => bcrypt('garcia'),

            'dni' => '87456321',
            'nombre' => 'Cesar GI',
            'apellido' => 'Garcia',
            'direccion' => 'Sullana',
            'rol_id' => '1',
        ]);
    }
}
