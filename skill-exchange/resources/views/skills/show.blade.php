@extends('layouts.app')

@section('title', $skill['name'])

@section('styles')
<style>
    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        color: var(--muted);
        text-decoration: none;
        font-size: 0.875rem;
        margin-bottom: 2rem;
        padding: 0.4rem 0.8rem;
        border: 1px solid var(--border);
        border-radius: 6px;
        transition: all 0.2s;
    }
    .back-link:hover { color: var(--ink); border-color: var(--ink); }
    .detail-wrap { display: grid; grid-template-columns: 1fr 340px; gap: 1.5rem; }
    .main-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 16px;
        overflow: hidden;
    }
    .main-card-header {
        background: var(--ink);
        color: #fff;
        padding: 2rem 2rem 1.5rem;
    }
    .cat-label {
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: #f4a87c;
        margin-bottom: 0.5rem;
    }
    .skill-title {
        font-family: 'Clash Display', sans-serif;
        font-size: 2.2rem;
        font-weight: 700;
        letter-spacing: -0.03em;
        margin-bottom: 0.4rem;
    }
    .offered-by { color: rgba(255,255,255,0.6); font-size: 0.9rem; }
    .offered-by strong { color: #fff; }
    .main-card-body { padding: 2rem; }
    .section-label {
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--muted);
        margin-bottom: 0.6rem;
    }
    .description {
        font-size: 0.97rem;
        line-height: 1.75;
        color: var(--ink);
        margin-bottom: 1.8rem;
    }
    .attributes { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
    .attr {
        background: var(--bg);
        border: 1px solid var(--border);
        border-radius: 10px;
        padding: 1rem;
    }
    .attr-label { font-size: 0.72rem; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: var(--muted); margin-bottom: 0.35rem; }
    .attr-value { font-size: 0.95rem; font-weight: 600; color: var(--ink); }
    .side-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 1.5rem;
        height: fit-content;
    }
    .side-title {
        font-family: 'Clash Display', sans-serif;
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 1.2rem;
        padding-bottom: 0.8rem;
        border-bottom: 1px solid var(--border);
    }
    .info-row { display: flex; flex-direction: column; gap: 0.2rem; margin-bottom: 1.2rem; }
    .info-row:last-child { margin-bottom: 0; }
    .info-label { font-size: 0.72rem; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: var(--muted); }
    .info-value { font-size: 0.9rem; color: var(--ink); font-weight: 500; }
    .exchange-box {
        background: #e3f2ec;
        border: 1px solid #b8deca;
        border-radius: 10px;
        padding: 1rem;
        margin-top: 1.2rem;
        text-align: center;
    }
    .exchange-box p { font-size: 0.78rem; color: var(--accent2); font-weight: 600; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 0.3rem; }
    .exchange-box strong { font-family: 'Clash Display', sans-serif; font-size: 1.1rem; color: #1a4f33; }
    .badge { padding: 0.3rem 0.8rem; border-radius: 20px; font-size: 0.78rem; font-weight: 600; display: inline-block; }
    .badge-level { background: #fde8df; color: #d4522a; }
    @media(max-width: 720px) {
        .detail-wrap { grid-template-columns: 1fr; }
        .attributes { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
<a href="/skills" class="back-link">← Back to All Skills</a>

<div class="detail-wrap">
    <div class="main-card">
        <div class="main-card-header">
            <div class="cat-label">{{ $skill['category'] }}</div>
            <div class="skill-title">{{ $skill['name'] }}</div>
            <div class="offered-by">offered by <strong>{{ $skill['offered_by'] }}</strong></div>
        </div>
        <div class="main-card-body">
            <div class="section-label">About this Skill</div>
            <div class="description">{{ $skill['description'] }}</div>

            <div class="section-label">Details</div>
            <div class="attributes">
                <div class="attr">
                    <div class="attr-label">Proficiency Level</div>
                    <div class="attr-value">{{ $skill['level'] }}</div>
                </div>
                <div class="attr">
                    <div class="attr-label">Category</div>
                    <div class="attr-value">{{ $skill['category'] }}</div>
                </div>
                <div class="attr">
                    <div class="attr-label">Schedule</div>
                    <div class="attr-value">{{ $skill['schedule'] }}</div>
                </div>
                <div class="attr">
                    <div class="attr-label">Contact</div>
                    <div class="attr-value">{{ $skill['contact'] }}</div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="side-card">
            <div class="side-title">📋 Skill Info</div>

            <div class="info-row">
                <span class="info-label">Offered By</span>
                <span class="info-value">{{ $skill['offered_by'] }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Level</span>
                <span class="badge badge-level">{{ $skill['level'] }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Schedule</span>
                <span class="info-value">{{ $skill['schedule'] }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Contact</span>
                <span class="info-value">{{ $skill['contact'] }}</span>
            </div>

            <div class="exchange-box">
                <p>Looking to learn</p>
                <strong>{{ $skill['looking_for'] }}</strong>
            </div>
        </div>
    </div>
</div>
@endsection
