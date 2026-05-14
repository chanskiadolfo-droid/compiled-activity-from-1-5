@extends('layouts.app')

@section('title', 'Workshop Registration Form')

@section('styles')
<style>
    .page-wrap {
        max-width: 720px;
        margin: 0 auto;
    }
    .page-header { margin-bottom: 2rem; }
    .page-header h1 {
        font-size: 2rem;
        font-weight: 800;
        letter-spacing: -0.03em;
        color: var(--ink);
    }
    .page-header h1 span { color: var(--accent); }
    .page-header p { color: var(--muted); margin-top: 0.4rem; font-size: 0.95rem; }

    /* Global errors box */
    .error-box {
        background: var(--danger-light);
        border: 1px solid #fbb;
        border-left: 4px solid var(--danger);
        border-radius: 10px;
        padding: 1rem 1.2rem;
        margin-bottom: 1.5rem;
    }
    .error-box p {
        font-weight: 700;
        color: var(--danger);
        font-size: 0.88rem;
        margin-bottom: 0.5rem;
    }
    .error-box ul { padding-left: 1.2rem; }
    .error-box ul li { font-size: 0.83rem; color: var(--danger); margin-bottom: 0.2rem; }

    .form-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 24px rgba(67,97,238,0.07);
    }
    .form-section {
        padding: 1.5rem 2rem;
        border-bottom: 1px solid var(--border);
    }
    .form-section:last-of-type { border-bottom: none; }
    .section-heading {
        font-size: 0.72rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: var(--accent);
        margin-bottom: 1.2rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .section-heading::after {
        content: '';
        flex: 1;
        height: 1px;
        background: var(--accent-light);
    }
    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
    .form-group { margin-bottom: 1rem; }
    .form-group:last-child { margin-bottom: 0; }
    label {
        display: block;
        font-size: 0.8rem;
        font-weight: 600;
        color: var(--ink);
        margin-bottom: 0.4rem;
    }
    label .req { color: var(--danger); margin-left: 2px; }
    input[type="text"],
    input[type="email"],
    input[type="number"],
    input[type="tel"],
    select,
    textarea {
        width: 100%;
        padding: 0.7rem 0.9rem;
        border: 1.5px solid var(--border);
        border-radius: 8px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 0.92rem;
        color: var(--ink);
        background: #fff;
        transition: border-color 0.2s, box-shadow 0.2s;
        outline: none;
    }
    input:focus, select:focus, textarea:focus {
        border-color: var(--accent);
        box-shadow: 0 0 0 3px rgba(67,97,238,0.1);
    }
    input.is-error, select.is-error, textarea.is-error {
        border-color: var(--danger);
        background: var(--danger-light);
    }
    .field-error {
        font-size: 0.76rem;
        color: var(--danger);
        margin-top: 0.3rem;
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }
    select option { color: var(--ink); }
    textarea { resize: vertical; min-height: 100px; }
    .hint { font-size: 0.74rem; color: var(--muted); margin-top: 0.25rem; }
    .form-footer {
        padding: 1.5rem 2rem;
        background: #f8f9ff;
        border-top: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .form-footer p { font-size: 0.78rem; color: var(--muted); }
    .btn-submit {
        padding: 0.8rem 2.5rem;
        background: var(--accent);
        color: #fff;
        border: none;
        border-radius: 8px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 0.95rem;
        font-weight: 700;
        cursor: pointer;
        transition: opacity 0.2s, transform 0.1s;
        letter-spacing: -0.01em;
    }
    .btn-submit:hover { opacity: 0.88; transform: translateY(-1px); }
    .btn-submit:active { transform: translateY(0); }
    @media(max-width: 600px) {
        .form-row { grid-template-columns: 1fr; }
        .form-section { padding: 1.2rem; }
        .form-footer { flex-direction: column; gap: 1rem; text-align: center; }
        .btn-submit { width: 100%; }
    }
</style>
@endsection

@section('content')
<div class="page-wrap">
    <div class="page-header">
        <h1>Workshop <span>Registration</span></h1>
        <p>Fill out the form below to reserve your spot in our upcoming workshops.</p>
    </div>

    {{-- SHOW ALL ERRORS --}}
    @if ($errors->any())
    <div class="error-box">
        <p>⚠ Please fix the following errors:</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="form-card">
        <form action="/form" method="POST">
            @csrf

            {{-- PERSONAL INFORMATION --}}
            <div class="form-section">
                <div class="section-heading">👤 Personal Information</div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Full Name <span class="req">*</span></label>
                        <input
                            type="text"
                            name="full_name"
                            value="{{ old('full_name') }}"
                            placeholder="e.g. Juan Dela Cruz"
                            class="{{ $errors->has('full_name') ? 'is-error' : '' }}"
                        />
                        @error('full_name')
                            <div class="field-error">⚡ {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Age <span class="req">*</span></label>
                        <input
                            type="number"
                            name="age"
                            value="{{ old('age') }}"
                            placeholder="e.g. 20"
                            min="15"
                            max="80"
                            class="{{ $errors->has('age') ? 'is-error' : '' }}"
                        />
                        @error('age')
                            <div class="field-error">⚡ {{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Email Address <span class="req">*</span></label>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="e.g. juan@email.com"
                            class="{{ $errors->has('email') ? 'is-error' : '' }}"
                        />
                        @error('email')
                            <div class="field-error">⚡ {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Phone Number <span class="req">*</span></label>
                        <input
                            type="tel"
                            name="phone"
                            value="{{ old('phone') }}"
                            placeholder="e.g. 09123456789"
                            class="{{ $errors->has('phone') ? 'is-error' : '' }}"
                        />
                        @error('phone')
                            <div class="field-error">⚡ {{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- WORKSHOP DETAILS --}}
            <div class="form-section">
                <div class="section-heading">🎯 Workshop Details</div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Select Workshop <span class="req">*</span></label>
                        <select name="workshop" class="{{ $errors->has('workshop') ? 'is-error' : '' }}">
                            <option value="">-- Choose a Workshop --</option>
                            @foreach([
                                'Web Development Bootcamp',
                                'UI/UX Design Fundamentals',
                                'Data Science with Python',
                                'Mobile App Development',
                                'Cybersecurity Essentials',
                                'Digital Marketing Masterclass',
                            ] as $w)
                                <option value="{{ $w }}" {{ old('workshop') === $w ? 'selected' : '' }}>{{ $w }}</option>
                            @endforeach
                        </select>
                        @error('workshop')
                            <div class="field-error">⚡ {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Experience Level <span class="req">*</span></label>
                        <select name="experience" class="{{ $errors->has('experience') ? 'is-error' : '' }}">
                            <option value="">-- Select Level --</option>
                            @foreach(['Beginner', 'Intermediate', 'Advanced'] as $e)
                                <option value="{{ $e }}" {{ old('experience') === $e ? 'selected' : '' }}>{{ $e }}</option>
                            @endforeach
                        </select>
                        @error('experience')
                            <div class="field-error">⚡ {{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Number of Seats <span class="req">*</span></label>
                    <input
                        type="number"
                        name="seats"
                        value="{{ old('seats', 1) }}"
                        min="1"
                        max="5"
                        class="{{ $errors->has('seats') ? 'is-error' : '' }}"
                    />
                    <div class="hint">Maximum 5 seats per registration.</div>
                    @error('seats')
                        <div class="field-error">⚡ {{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- ADDITIONAL INFO --}}
            <div class="form-section">
                <div class="section-heading">📝 Additional Information</div>
                <div class="form-group">
                    <label>Message / Special Requests <span style="color:var(--muted);font-weight:400">(optional)</span></label>
                    <textarea
                        name="message"
                        placeholder="Any questions or special accommodations..."
                        class="{{ $errors->has('message') ? 'is-error' : '' }}"
                    >{{ old('message') }}</textarea>
                    @error('message')
                        <div class="field-error">⚡ {{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-footer">
                <p>Fields marked with <span style="color:var(--danger)">*</span> are required.</p>
                <button type="submit" class="btn-submit">Register Now →</button>
            </div>
        </form>
    </div>
</div>
@endsection
