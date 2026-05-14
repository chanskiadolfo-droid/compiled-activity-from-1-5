@extends('layouts.app')

@section('content')
<style>
    .show-card { max-width: 560px; background: var(--card); border: 1px solid var(--border); border-radius: 14px; overflow: hidden; }
    .show-header { background: linear-gradient(135deg, rgba(108,99,255,0.3), rgba(255,101,132,0.15)); padding: 2rem; display: flex; align-items: center; gap: 1.5rem; }
    .big-q { font-family: 'Syne', sans-serif; font-size: 4rem; font-weight: 800; color: var(--accent); line-height: 1; }
    .show-name { font-family: 'Syne', sans-serif; font-size: 1.4rem; font-weight: 700; }
    .show-body { padding: 1.5rem 2rem; }
    .info-row { display: flex; justify-content: space-between; align-items: center; padding: 0.85rem 0; border-bottom: 1px solid var(--border); font-size: 0.9rem; }
    .info-row:last-of-type { border-bottom: none; }
    .info-label { color: var(--muted); font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.05em; }
    .status-pill { display: inline-block; padding: 0.3rem 0.8rem; border-radius: 20px; font-size: 0.8rem; font-weight: 600; }
    .s-waiting  { background: rgba(250,204,21,0.15);  color: var(--yellow); }
    .s-progress { background: rgba(96,165,250,0.15);  color: var(--blue); }
    .s-done     { background: rgba(74,222,128,0.15);  color: var(--green); }
    .s-cancel   { background: rgba(248,113,113,0.15); color: var(--red); }
    .action-bar { padding: 1.2rem 2rem; background: var(--surface); display: flex; gap: 0.75rem; border-top: 1px solid var(--border); }
    .btn { padding: 0.65rem 1.2rem; border-radius: 8px; font-size: 0.88rem; font-weight: 600; cursor: pointer; border: none; text-decoration: none; display: inline-flex; align-items: center; gap: 0.3rem; transition: opacity 0.2s; }
    .btn:hover { opacity: 0.8; }
    .btn-edit   { background: rgba(250,204,21,0.15); color: var(--yellow); }
    .btn-delete { background: rgba(248,113,113,0.15); color: var(--red); }
    .btn-back   { background: var(--border); color: var(--text); }
</style>

<a href="{{ route('reservations.index') }}" style="color:var(--muted);text-decoration:none;font-size:0.85rem;display:inline-flex;align-items:center;gap:0.3rem;margin-bottom:1.5rem;">← Back to Queue Board</a>

<div class="show-card">
    <div class="show-header">
        <div class="big-q">#{{ $reservation->queue_number }}</div>
        <div>
            <div class="show-name">{{ $reservation->name }}</div>
            <div style="color:var(--muted);font-size:0.85rem;margin-top:0.3rem;">{{ $reservation->service_type }}</div>
        </div>
    </div>

    <div class="show-body">
        <div class="info-row">
            <span class="info-label">Queue Number</span>
            <strong>#{{ $reservation->queue_number }}</strong>
        </div>
        <div class="info-row">
            <span class="info-label">Full Name</span>
            <span>{{ $reservation->name }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Service Type</span>
            <span>{{ $reservation->service_type }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Contact Number</span>
            <span>{{ $reservation->contact_number }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Status</span>
            @php
                $cls = match($reservation->status) {
                    'Waiting'     => 's-waiting',
                    'In Progress' => 's-progress',
                    'Completed'   => 's-done',
                    default       => 's-cancel',
                };
            @endphp
            <span class="status-pill {{ $cls }}">{{ $reservation->status }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Created At</span>
            <span>{{ $reservation->created_at->format('M d, Y h:i A') }}</span>
        </div>
    </div>

    <div class="action-bar">
        <a href="{{ route('reservations.index') }}" class="btn btn-back">← Back</a>
        <a href="{{ route('reservations.edit', $reservation) }}" class="btn btn-edit">Edit</a>
        <form action="{{ route('reservations.destroy', $reservation) }}" method="POST" onsubmit="return confirm('Delete this reservation?')" style="margin-left:auto;">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-delete">Delete</button>
        </form>
    </div>
</div>
@endsection
