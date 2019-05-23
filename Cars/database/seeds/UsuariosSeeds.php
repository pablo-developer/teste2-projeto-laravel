<?php

use Illuminate\Database\Seeder;

class UsuariosSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'PABLO',
            'email'=>'admin@mail.com',
            'password'=>Hash::make('123456'),
        ]);
    }
}
