<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('time_tables')->insert([
            ['teacher_id' => 1, 'class_day' => 'Monaday', 'from_timing' => '9:00', 'to_timing' => '10:00', 'is_lunch' => false,],

        ]);
    }
}
