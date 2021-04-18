<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassUSerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_students')->insert([
            ['user_id' => 3, 'classroom_id' => 1],
            ['user_id' => 4, 'classroom_id' => 1],
            ['user_id' => 5, 'classroom_id' => 2],
            ['user_id' => 6, 'classroom_id' => 2],
        ]);
    }
}
