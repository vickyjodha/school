<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeTableCreate extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('time_table_students')->insert([
            ['student_id' => 3, 'timetable_id' => 1],
            ['student_id' => 4, 'timetable_id' => 1],
            ['student_id' => 5, 'timetable_id' => 2],
            ['student_id' => 6, 'timetable_id' => 2],
        ]);
    }
}
