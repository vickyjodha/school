<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class timeTable extends Model
{
    use HasFactory;
    protected $fillable = ['teacher_id', 'class_day', 'from_timing', 'to_timing', 'is_lunch'];
    public function studentTime()
    {
        return $this->belongsToMany(User::class, 'time_table_students', 'student_id', 'timetable_id');
    }
}
