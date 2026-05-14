@extends('layouts.app')

@section('content')
<style>
    /* Same form styles as create */
    .form-card { max-width: 560px; background: var(--card); border: 1px solid var(--border); border-radius: 14px; padding: 2rem; }
    .form-title { font-family: 'Syne', sans-serif; font-size: 1.5rem; font-weight: 800; margin-bottom: 1.5rem; }
    .form-title span { color: var(--yellow); }
    .form-group { margin-bottom: 1.2rem; }
    label { display: block; font-size: 0.8rem; font-weight: 600; color: var(--muted); letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 0.4rem; }
    input, select { width: 100%; background: var(--surface); border: 1px solid var(--border); border-radius: 8px; padding: 0.75rem 1rem; color: var(--text); font-family: 'DM Sans', sans-serif; font-size: 0.95rem; outline: none; transition: border-color 0.2s; }
    input:focus, select:focus { border-color: var(--yellow); }
    select option { background: var(--surface); }
    .error { color: var(--red); font-size: 0.78rem; margin-top: 0.3rem; }
    .btn-row { display: flex; gap: 0.75rem; margin-top: 1.5rem; }
    .btn-primary { flex: 1; padding: 0.8rem; background: var(--yellow); color: #000; border: none; border-radius: 8px; font-family: 'Syne', sans-serif; font-size: 1rem; font-weight: 700; cursor: pointer; transition: opacity 0.2s; }
    .btn-primary:hover { opacity: 0.85; }
    .btn-back { padding: 0.8rem 1.2rem; background: transparent; color: var(--muted); border: 1px solid var(--border); border-radius: 8px; text-decoration: none; font-size: 0.9rem; display: flex; align-items: center; }
    .btn-back:hover { border-color: var(--text); color: var(--text); }
    .q-info { background: rgba(250,204,21,0.08); border: 1px solid rgba(250,204,21,0.2); border-radius: 8px; padding: 0.75rem 1rem; margin-bottom: 1.5rem; font-size: 0.85rem; color: var(--yellow); }
</style>

<a href="{{ route('reservations.index') }}" style="color:var(--muted);text-decoration:none;font-size:0.85rem;display:inline-flex;align-items:center;gap:0.3rem;margin-bottom:1.5rem;">← Back to Queue Board</a>

<div class="form-card">
    <h1 class="form-title">Edit <span>Reservation</span></h1>
    <div class="q-info">Editing Queue #{{ $reservation->queue_number }} — {{ $reservation->name }}</div>

    <form action="{{ route('reservations.update', $reservation) }}" method="POST">
        @csrf @method('PUT')

        <div class="form-group">
            <label>Customer Name</label>
            <input type="text" name="name" value="{{ old('name', $reservation->name) }}" />
            @error('name') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Service Type</label>
            <select name="service_type">
                @foreach(['Consultation','Bill Payment','Account Opening','Loan Application','Customer Support'] as $s)
                    <option value="{{ $s }}" {{ old('service_type', $reservation->service_type) === $s ? 'selected' : '' }}>{{ $s }}</option>
                @endforeach
            </select>
            @error('service_type') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Contact Number</label>
            <input type="text" name="contact_number" value="{{ old('contact_number', $reservation->contact_number) }}" />
            @error('contact_number') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status">
                @foreach(['Waiting','In Progress','Completed','Cancelled'] as $st)
                    <option value="{{ $st }}" {{ old('status', $reservation->status) === $st ? 'selected' : '' }}>{{ $st }}</option>
                @endforeach
            </select>
            @error('status') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="btn-row">
            <a href="{{ route('reservations.index') }}" class="btn-back">Cancel</a>
            <button type="submit" class="btn-primary">Save Changes</button>
        </div>
    </form>
</div>
@endsection
