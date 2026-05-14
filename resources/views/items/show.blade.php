@extends('layouts.app')

@section('content')
<style>
    .detail-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 14px;
        padding: 1.5rem;
        max-width: 760px;
    }
    .detail-card h1 {
        font-family: 'Syne', sans-serif;
        font-size: 1.8rem;
        margin-bottom: 0.6rem;
    }
    .info-row {
        border-top: 1px solid var(--border);
        padding: 0.9rem 0;
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

<section class="detail-card">
    <h1>{{ $item['name'] }}</h1>
    <p style="color:var(--muted); margin-bottom:1rem;">{{ $item['description'] }}</p>

    <div class="info-row">
        <div class="label">Category</div>
        <div>{{ $item['category'] }}</div>
    </div>

    <div class="info-row">
        <div class="label">Estimated Time</div>
        <div>{{ $item['estimated_time'] }}</div>
    </div>

    <div class="info-row">
        <div class="label">Priority Type</div>
        <div>{{ $item['priority'] }}</div>
    </div>

    <a class="btn" href="{{ route('items.index') }}">Back to List</a>
</section>
@endsection
