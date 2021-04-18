<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTableStudent extends Model
{
    protected $fillable = ['student_id', 'timetable_id'];
    protected $table = 'time_table_students';

    use HasFactory;
}
