<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // Display all reservations
    public function index()
    {
        $reservations = Reservation::latest()->get();
        return view('reservations.index', compact('reservations'));
    }

    // Show the create form
    public function create()
    {
        $nextQueue = (Reservation::max('queue_number') ?? 0) + 1;
        return view('reservations.create', compact('nextQueue'));
    }

    // Save new reservation
    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'service_type'   => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
        ]);

        Reservation::create([
            'name'           => $request->name,
            'service_type'   => $request->service_type,
            'contact_number' => $request->contact_number,
            'status'         => 'Waiting',
            'queue_number'   => (Reservation::max('queue_number') ?? 0) + 1,
        ]);

        return redirect()->route('reservations.index')
                         ->with('success', 'Reservation created successfully!');
    }

    // Show single reservation
    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }

    // Show edit form
    public function edit(Reservation $reservation)
    {
        return view('reservations.edit', compact('reservation'));
    }

    // Update reservation
    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'service_type'   => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'status'         => 'required|string|in:Waiting,In Progress,Completed,Cancelled',
        ]);

        $reservation->update($request->only([
            'name', 'service_type', 'contact_number', 'status'
        ]));

        return redirect()->route('reservations.index')
                         ->with('success', 'Reservation updated successfully!');
    }

    // Delete reservation
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index')
                         ->with('success', 'Reservation deleted successfully!');
    }
}
