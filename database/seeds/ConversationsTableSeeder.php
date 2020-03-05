<?php

use App\Conversations;
use Illuminate\Database\Seeder;

class ConversationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Conversations::create([
            'user_id' => 1,
            'contact_id' => 2,
            'last_message' => '',
            'last_time' => NULL
        ]);

        Conversations::create([
            'user_id' => 2,
            'contact_id' => 1,
            'last_message' => '',
            'last_time' => NULL
        ]);
        
        Conversations::create([
            'user_id' => 1,
            'contact_id' => 3,
            'last_message' => '',
            'last_time' => NULL
        ]);
    }
}
