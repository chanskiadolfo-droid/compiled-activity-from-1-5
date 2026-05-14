<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function create()
    {
        return view('form.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name' => 'required|min:3|max:255',
            'email' => 'required|email|max:255',
            'student_number' => 'required|numeric|min:1000',
            'service_type' => 'required',
            'preferred_date' => 'required|date',
            'priority_level' => 'required',
            'message' => 'required|min:10',
        ]);

        return view('form.success', compact('validated'));
    }
}
