<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chat_rooms')->insert([
            'name' => 'The Darkroom'
        ]);
        DB::table('chat_rooms')->insert([
            'name' => 'Smoking & Cigars'
        ]);
        DB::table('chat_rooms')->insert([
            'name' => 'Humiliation'
        ]);
        DB::table('chat_rooms')->insert([
            'name' => 'Financial Domination'
        ]);
        DB::table('chat_rooms')->insert([
            'name' => 'Pups & Handlers'
        ]);
    }
}
