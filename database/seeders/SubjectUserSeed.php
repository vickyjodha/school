<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subject_student_ids')->insert([
            ['user_id' => 3, 'subject_id' => 1],
            ['user_id' => 4, 'subject_id' => 1],
            ['user_id' => 5, 'subject_id' => 2],
            ['user_id' => 6, 'subject_id' => 2],
        ]);
    }
}
