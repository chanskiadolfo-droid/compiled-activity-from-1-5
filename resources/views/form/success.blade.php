@extends('layouts.app')

@section('content')
<style>
    .success-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 14px;
        padding: 1.5rem;
        max-width: 780px;
    }

    .success-card h1 {
        font-family: 'Syne', sans-serif;
        font-size: 1.8rem;
        margin-bottom: 0.8rem;
    }

    .row {
        border-top: 1px solid var(--border);
        padding: 0.85rem 0;
    }

    .label {
        color: var(--muted);
        font-size: 0.78rem;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        margin-bottom: 0.2rem;
    }

    .btn {
        display: inline-block;
        margin-top: 1rem;
        padding: 0.55rem 0.9rem;
        border-radius: 7px;
        background: var(--accent);
        color: #fff;
        text-decoration: none;
        font-size: 0.88rem;
        font-weight: 700;
    }
</style>

<section class="success-card">
    <h1>Request Submitted Successfully</h1>
    <p style="color:var(--muted); margin-bottom:1rem;">
        Your form passed Laravel validation.
    </p>

    <div class="row">
        <div class="label">Student Name</div>
        <div>{{ $validated['student_name'] }}</div>
    </div>

    <div class="row">
        <div class="label">Email</div>
        <div>{{ $validated['email'] }}</div>
    </div>

    <div class="row">
        <div class="label">Student Number</div>
        <div>{{ $validated['student_number'] }}</div>
    </div>

    <div class="row">
        <div class="label">Service Type</div>
        <div>{{ $validated['service_type'] }}</div>
    </div>

    <div class="row">
        <div class="label">Preferred Date</div>
        <div>{{ $validated['preferred_date'] }}</div>
    </div>

    <div class="row">
        <div class="label">Priority Level</div>
        <div>{{ $validated['priority_level'] }}</div>
    </div>

    <div class="row">
        <div class="label">Request Details</div>
        <div>{{ $validated['message'] }}</div>
    </div>

    <a class="btn" href="{{ route('form.create') }}">Submit Another Request</a>
    <a class="btn" href="{{ route('reservations.index') }}">Back to Queue CRUD</a>
</section>
@endsection
