@extends('layouts.app')

@section('content')
<style>
    .page-title {
        font-family: 'Syne', sans-serif;
        font-size: 1.9rem;
        font-weight: 800;
        margin-bottom: 0.4rem;
    }
    .page-subtitle {
        color: var(--muted);
        margin-bottom: 1.5rem;
    }
    .item-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 1rem;
    }
    .item-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 1.2rem;
    }
    .item-card h2 {
        font-family: 'Syne', sans-serif;
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
    }
    .muted { color: var(--muted); font-size: 0.9rem; }
    .tag {
        display: inline-block;
        margin: 0.8rem 0;
        padding: 0.25rem 0.7rem;
        border-radius: 999px;
        background: rgba(108,99,255,0.15);
        color: var(--accent);
        font-size: 0.8rem;
        font-weight: 700;
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

<h1 class="page-title">Queue Reservation Info System</h1>
<p class="page-subtitle">Browse available school office queue services and open each service for full details.</p>

<div class="item-grid">
    @foreach($items as $item)
        <article class="item-card">
            <h2>{{ $item['name'] }}</h2>
            <p class="muted">{{ $item['description'] }}</p>
            <span class="tag">{{ $item['category'] }}</span>
            <p class="muted">Estimated time: {{ $item['estimated_time'] }}</p>
            <a class="btn" href="{{ route('items.show', $item['id']) }}">View Details</a>
        </article>
    @endforeach
</div>
@endsection
