<?php

use App\Messages;
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Messages::create([
            'from_id' => 1,
            'to_id' => 2,
            'content' => 'hola, como estas?',
        ]);

        Messages::create([
            'from_id' => 2,
            'to_id' => 1,
            'content' => 'muy bien y tu?',
        ]);
    }
}
