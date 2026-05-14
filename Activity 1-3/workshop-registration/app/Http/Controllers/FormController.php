<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    // Show the registration form
    public function create()
    {
        return view('form.create');
    }

    // Handle form submission & validation
    public function store(Request $request)
    {
        $request->validate([
            'full_name'    => 'required|min:3|max:100',
            'email'        => 'required|email',
            'phone'        => 'required|digits_between:10,13',
            'age'          => 'required|numeric|min:15|max:80',
            'workshop'     => 'required',
            'experience'   => 'required',
            'seats'        => 'required|numeric|min:1|max:5',
            'message'      => 'nullable|max:500',
        ]);

        // Store in session and redirect to success page
        session([
            'registration' => $request->only([
                'full_name', 'email', 'phone', 'age',
                'workshop', 'experience', 'seats', 'message'
            ])
        ]);

        return redirect('/success');
    }

    // Show success page
    public function success()
    {
        $registration = session('registration');

        if (!$registration) {
            return redirect('/form');
        }

        return view('form.success', compact('registration'));
    }
}
