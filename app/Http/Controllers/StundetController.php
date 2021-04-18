<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StundetController extends Controller
{
    public function show_details()
    {
        $student = User::with('student')
            ->where('id', 3)
            ->first();
        return $student;
    }
}
