@extends('layouts.app')

@section('content')
<style>
    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 2rem;
    }
    .page-title {
        font-family: 'Syne', sans-serif;
        font-size: 1.8rem;
        font-weight: 800;
        letter-spacing: -0.03em;
    }
    .page-title span { color: var(--accent); }
    .stat-bar {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1rem;
        margin-bottom: 2rem;
    }
    .stat {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 10px;
        padding: 1rem 1.2rem;
        text-align: center;
    }
    .stat-num {
        font-family: 'Syne', sans-serif;
        font-size: 2rem;
        font-weight: 800;
    }
    .stat-label { color: var(--muted); font-size: 0.78rem; margin-top: 2px; }
    .table-wrap {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 12px;
        overflow: hidden;
    }
    table { width: 100%; border-collapse: collapse; }
    th {
        background: var(--surface);
        padding: 0.85rem 1.2rem;
        font-size: 0.75rem;
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--muted);
        text-align: left;
    }
    td {
        padding: 1rem 1.2rem;
        border-top: 1px solid var(--border);
        font-size: 0.9rem;
        vertical-align: middle;
    }
    tr:hover td { background: rgba(108,99,255,0.04); }
    .q-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 8px;
        background: rgba(108,99,255,0.15);
        color: var(--accent);
        font-family: 'Syne', sans-serif;
        font-weight: 800;
        font-size: 0.95rem;
    }
    .status-pill {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    .s-waiting  { background: rgba(250,204,21,0.15);  color: var(--yellow); }
    .s-progress { background: rgba(96,165,250,0.15);  color: var(--blue); }
    .s-done     { background: rgba(74,222,128,0.15);  color: var(--green); }
    .s-cancel   { background: rgba(248,113,113,0.15); color: var(--red); }
    .actions { display: flex; gap: 0.5rem; flex-wrap: wrap; }
    .btn {
        padding: 0.35rem 0.8rem;
        border-radius: 6px;
        font-size: 0.8rem;
        font-weight: 500;
        cursor: pointer;
        border: none;
        text-decoration: none;
        display: inline-block;
        transition: opacity 0.2s;
    }
    .btn:hover { opacity: 0.8; }
    .btn-view   { background: rgba(108,99,255,0.2); color: var(--accent); }
    .btn-edit   { background: rgba(250,204,21,0.15); color: var(--yellow); }
    .btn-delete { background: rgba(248,113,113,0.15); color: var(--red); }
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: var(--muted);
    }
    .empty-state h3 { font-family: 'Syne', sans-serif; font-size: 1.2rem; margin-bottom: 0.5rem; color: var(--text); }
    @media(max-width:700px) {
        .stat-bar { grid-template-columns: repeat(2, 1fr); }
        th:nth-child(3), td:nth-child(3) { display: none; }
    }
</style>

<div class="page-header">
    <h1 class="page-title">Queue <span>Board</span></h1>
    <a href="{{ route('reservations.create') }}" class="btn" style="background:var(--accent);color:#fff;padding:0.6rem 1.2rem;font-size:0.9rem;">+ Add Reservation</a>
</div>

<div class="stat-bar">
    <div class="stat">
        <div class="stat-num" style="color:var(--text)">{{ $reservations->count() }}</div>
        <div class="stat-label">Total</div>
    </div>
    <div class="stat">
        <div class="stat-num" style="color:var(--yellow)">{{ $reservations->where('status','Waiting')->count() }}</div>
        <div class="stat-label">Waiting</div>
    </div>
    <div class="stat">
        <div class="stat-num" style="color:var(--blue)">{{ $reservations->where('status','In Progress')->count() }}</div>
        <div class="stat-label">In Progress</div>
    </div>
    <div class="stat">
        <div class="stat-num" style="color:var(--green)">{{ $reservations->where('status','Completed')->count() }}</div>
        <div class="stat-label">Completed</div>
    </div>
</div>

<div class="table-wrap">
    @if($reservations->isEmpty())
        <div class="empty-state">
            <h3>No reservations yet</h3>
            <p>Click "Add Reservation" to get started.</p>
        </div>
    @else
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Service</th>
                <th>Contact</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $r)
            <tr>
                <td><div class="q-badge">{{ $r->queue_number }}</div></td>
                <td><strong>{{ $r->name }}</strong></td>
                <td>{{ $r->service_type }}</td>
                <td>{{ $r->contact_number }}</td>
                <td>
                    @php
                        $cls = match($r->status) {
                            'Waiting'     => 's-waiting',
                            'In Progress' => 's-progress',
                            'Completed'   => 's-done',
                            default       => 's-cancel',
                        };
                    @endphp
                    <span class="status-pill {{ $cls }}">{{ $r->status }}</span>
                </td>
                <td>
                    <div class="actions">
                        <a href="{{ route('reservations.show', $r) }}" class="btn btn-view">View</a>
                        <a href="{{ route('reservations.edit', $r) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('reservations.destroy', $r) }}" method="POST" onsubmit="return confirm('Delete this reservation?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-delete">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
