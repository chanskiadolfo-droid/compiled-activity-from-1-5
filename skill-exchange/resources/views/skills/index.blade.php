@extends('layouts.app')

@section('title', 'All Skills')

@section('styles')
<style>
    .page-hero { margin-bottom: 2.5rem; }
    .page-hero h1 {
        font-family: 'Clash Display', sans-serif;
        font-size: 2.8rem;
        font-weight: 700;
        letter-spacing: -0.04em;
        line-height: 1.1;
        color: var(--ink);
    }
    .page-hero h1 span { color: var(--accent); }
    .page-hero p { color: var(--muted); margin-top: 0.6rem; font-size: 1rem; }
    .stats-row {
        display: flex;
        gap: 1rem;
        margin-bottom: 2rem;
        flex-wrap: wrap;
    }
    .stat {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 10px;
        padding: 0.8rem 1.4rem;
        display: flex;
        align-items: center;
        gap: 0.6rem;
        font-size: 0.88rem;
        color: var(--muted);
    }
    .stat strong { color: var(--ink); font-size: 1.1rem; }
    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(290px, 1fr));
        gap: 1.2rem;
    }
    .card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 14px;
        padding: 1.5rem;
        text-decoration: none;
        color: inherit;
        display: block;
        transition: transform 0.2s, box-shadow 0.2s, border-color 0.2s;
        position: relative;
        overflow: hidden;
    }
    .card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        background: var(--accent);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.2s;
    }
    .card:hover { transform: translateY(-3px); box-shadow: 0 12px 30px rgba(0,0,0,0.08); border-color: var(--accent); }
    .card:hover::before { transform: scaleX(1); }
    .card-cat {
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--accent);
        margin-bottom: 0.5rem;
    }
    .card-title {
        font-family: 'Clash Display', sans-serif;
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.4rem;
    }
    .card-by { color: var(--muted); font-size: 0.85rem; margin-bottom: 1rem; }
    .card-desc {
        font-size: 0.88rem;
        color: var(--muted);
        line-height: 1.6;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        margin-bottom: 1rem;
    }
    .card-meta { display: flex; gap: 0.5rem; flex-wrap: wrap; align-items: center; }
    .badge {
        padding: 0.25rem 0.65rem;
        border-radius: 20px;
        font-size: 0.72rem;
        font-weight: 600;
    }
    .badge-level { background: #fde8df; color: #d4522a; }
    .badge-want  { background: #e3f2ec; color: #2a7d4f; }
    .card-arrow {
        position: absolute;
        bottom: 1.2rem;
        right: 1.2rem;
        color: var(--border);
        font-size: 1.2rem;
        transition: color 0.2s, transform 0.2s;
    }
    .card:hover .card-arrow { color: var(--accent); transform: translate(2px, -2px); }
</style>
@endsection

@section('content')
<div class="page-hero">
    <h1>Find a Skill,<br><span>Share a Skill.</span></h1>
    <p>Browse what your fellow students can teach — and what they're looking to learn.</p>
</div>

<div class="stats-row">
    <div class="stat"><strong>{{ count($skills) }}</strong> Skills Listed</div>
    <div class="stat"><strong>{{ collect($skills)->pluck('category')->unique()->count() }}</strong> Categories</div>
    <div class="stat"><strong>{{ count($skills) }}</strong> Students Participating</div>
</div>

<div class="grid">
    @foreach($skills as $skill)
    <a href="/skills/{{ $skill['id'] }}" class="card">
        <div class="card-cat">{{ $skill['category'] }}</div>
        <div class="card-title">{{ $skill['name'] }}</div>
        <div class="card-by">offered by <strong>{{ $skill['offered_by'] }}</strong></div>
        <div class="card-desc">{{ $skill['description'] }}</div>
        <div class="card-meta">
            <span class="badge badge-level">{{ $skill['level'] }}</span>
            <span class="badge badge-want">wants: {{ $skill['looking_for'] }}</span>
        </div>
        <span class="card-arrow">↗</span>
    </a>
    @endforeach
</div>
@endsection
