@extends('layouts.app')

@section('title', 'Registration Successful')

@section('styles')
<style>
    .success-wrap {
        max-width: 600px;
        margin: 2rem auto;
        text-align: center;
    }
    .checkmark {
        width: 80px;
        height: 80px;
        background: #e6faf8;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        margin: 0 auto 1.5rem;
        border: 3px solid #2ec4b6;
    }
    .success-wrap h1 {
        font-size: 1.9rem;
        font-weight: 800;
        letter-spacing: -0.03em;
        margin-bottom: 0.5rem;
    }
    .success-wrap h1 span { color: var(--success); }
    .success-wrap p { color: var(--muted); font-size: 0.95rem; margin-bottom: 2rem; }
    .summary-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 14px;
        overflow: hidden;
        text-align: left;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    }
    .summary-header {
        background: var(--ink);
        color: #fff;
        padding: 1rem 1.5rem;
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }
    .summary-body { padding: 1.2rem 1.5rem; }
    .summary-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.65rem 0;
        border-bottom: 1px solid var(--border);
        font-size: 0.9rem;
    }
    .summary-row:last-child { border-bottom: none; }
    .summary-row span:first-child { color: var(--muted); font-size: 0.8rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; }
    .summary-row span:last-child { font-weight: 600; color: var(--ink); }
    .btn-back {
        display: inline-block;
        padding: 0.8rem 2rem;
        background: var(--accent);
        color: #fff;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 700;
        font-size: 0.9rem;
        transition: opacity 0.2s;
    }
    .btn-back:hover { opacity: 0.85; }
</style>
@endsection

@section('content')
<div class="success-wrap">
    <div class="checkmark">✓</div>
    <h1>You're <span>Registered!</span></h1>
    <p>Your workshop registration has been submitted successfully. Here's a summary of your registration.</p>

    <div class="summary-card">
        <div class="summary-header">📋 Registration Summary</div>
        <div class="summary-body">
            <div class="summary-row">
                <span>Full Name</span>
                <span>{{ $registration['full_name'] }}</span>
            </div>
            <div class="summary-row">
                <span>Email</span>
                <span>{{ $registration['email'] }}</span>
            </div>
            <div class="summary-row">
                <span>Phone</span>
                <span>{{ $registration['phone'] }}</span>
            </div>
            <div class="summary-row">
                <span>Age</span>
                <span>{{ $registration['age'] }}</span>
            </div>
            <div class="summary-row">
                <span>Workshop</span>
                <span>{{ $registration['workshop'] }}</span>
            </div>
            <div class="summary-row">
                <span>Experience Level</span>
                <span>{{ $registration['experience'] }}</span>
            </div>
            <div class="summary-row">
                <span>Seats Reserved</span>
                <span>{{ $registration['seats'] }}</span>
            </div>
            @if($registration['message'])
            <div class="summary-row">
                <span>Message</span>
                <span>{{ $registration['message'] }}</span>
            </div>
            @endif
        </div>
    </div>

    <a href="/form" class="btn-back">← Register Another</a>
</div>
@endsection
