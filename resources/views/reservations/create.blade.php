@extends('layouts.app')

@section('content')
<style>
    .form-card {
        max-width: 560px;
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 14px;
        padding: 2rem;
    }
    .form-title {
        font-family: 'Syne', sans-serif;
        font-size: 1.5rem;
        font-weight: 800;
        margin-bottom: 1.5rem;
    }
    .form-title span { color: var(--accent); }
    .queue-preview {
        background: rgba(108,99,255,0.1);
        border: 1px solid rgba(108,99,255,0.3);
        border-radius: 10px;
        padding: 1rem;
        margin-bottom: 1.5rem;
        text-align: center;
    }
    .queue-preview p { color: var(--muted); font-size: 0.8rem; }
    .queue-preview strong { font-family: 'Syne', sans-serif; font-size: 2.5rem; font-weight: 800; color: var(--accent); }
    .form-group { margin-bottom: 1.2rem; }
    label { display: block; font-size: 0.8rem; font-weight: 600; color: var(--muted); letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 0.4rem; }
    input, select {
        width: 100%;
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 8px;
        padding: 0.75rem 1rem;
        color: var(--text);
        font-family: 'DM Sans', sans-serif;
        font-size: 0.95rem;
        transition: border-color 0.2s;
        outline: none;
    }
    input:focus, select:focus { border-color: var(--accent); }
    select option { background: var(--surface); }
    .error { color: var(--red); font-size: 0.78rem; margin-top: 0.3rem; }
    .btn-row { display: flex; gap: 0.75rem; margin-top: 1.5rem; }
    .btn-primary {
        flex: 1;
        padding: 0.8rem;
        background: var(--accent);
        color: #fff;
        border: none;
        border-radius: 8px;
        font-family: 'Syne', sans-serif;
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        transition: opacity 0.2s;
    }
    .btn-primary:hover { opacity: 0.85; }
    .btn-back {
        padding: 0.8rem 1.2rem;
        background: transparent;
        color: var(--muted);
        border: 1px solid var(--border);
        border-radius: 8px;
        text-decoration: none;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
    }
    .btn-back:hover { border-color: var(--text); color: var(--text); }
</style>

<a href="{{ route('reservations.index') }}" style="color:var(--muted);text-decoration:none;font-size:0.85rem;display:inline-flex;align-items:center;gap:0.3rem;margin-bottom:1.5rem;">← Back to Queue Board</a>

<div class="form-card">
    <h1 class="form-title">New <span>Reservation</span></h1>

    <div class="queue-preview">
        <p>Your queue number will be</p>
        <strong>#{{ $nextQueue }}</strong>
    </div>

    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Customer Name</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="e.g. Juan Dela Cruz" />
            @error('name') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Service Type</label>
            <select name="service_type">
                <option value="">Select a service...</option>
                @foreach(['Consultation','Bill Payment','Account Opening','Loan Application','Customer Support'] as $s)
                    <option value="{{ $s }}" {{ old('service_type') === $s ? 'selected' : '' }}>{{ $s }}</option>
                @endforeach
            </select>
            @error('service_type') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Contact Number</label>
            <input type="text" name="contact_number" value="{{ old('contact_number') }}" placeholder="e.g. 09XX-XXX-XXXX" />
            @error('contact_number') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="btn-row">
            <a href="{{ route('reservations.index') }}" class="btn-back">Cancel</a>
            <button type="submit" class="btn-primary">Confirm Reservation</button>
        </div>
    </form>
</div>
@endsection
