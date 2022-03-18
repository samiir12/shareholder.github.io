<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

public function run()
{
    DB::table('users')->delete();
    User::create(array(
        'name'     => 'Ibrahim Rahmani',
        'username' => 'irahmani',
        'email'    => 'ibrahim@xala.io',
        'password' => Hash::make('awesome'),
    ));
}

}
