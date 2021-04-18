<?php

namespace App\Http\Controllers;

use App\Models\timeTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassroomController extends Controller
{
    public function CreateTimeTaable(Request $request)
    {
        $classroom = timeTable::where('class_day', $request->day)
            ->where('from_timing', $request->fromtime)
            ->where('to_timing', $request->totime)
            ->first();
        if (!$classroom) {
            $class = new timeTable();
            $class->teacher_id = Auth::id();
            $class->subject_id = $request->subject;
            $class->class_day = $request->day;
            $class->from_timing = $request->fromtime;
            $class->to_timing = $request->totime;
            $class->is_lunch = $request->lunch;
            $class->save();
            return back();
        }
        return back()->with('error', 'schedule another class during the same time');
    }
}
