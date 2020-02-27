<?php

use App\User;
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
        User::create(['name' => 'Daniel',
        'email'=> 'admin@gmail.com',
        'password'=> bcrypt('12345')]);

        User::create(['name' => 'Alejandro',
        'email'=> 'admin2@gmail.com',
        'password'=> bcrypt('12345')]);
    }
}
