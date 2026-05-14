@extends('layouts.app')

@section('content')
<style>
    .form-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 14px;
        padding: 1.5rem;
        max-width: 780px;
    }

    .form-card h1 {
        font-family: 'Syne', sans-serif;
        font-size: 1.8rem;
        margin-bottom: 0.4rem;
    }

    .subtitle {
        color: var(--muted);
        margin-bottom: 1.4rem;
    }

    label {
        display: block;
        margin-bottom: 0.35rem;
        font-weight: 700;
        font-size: 0.9rem;
    }

    input, select, textarea {
        width: 100%;
        margin-bottom: 0.35rem;
        padding: 0.75rem;
        border-radius: 8px;
        border: 1px solid var(--border);
        background: var(--surface);
        color: var(--text);
        font: inherit;
    }

    textarea {
        min-height: 120px;
        resize: vertical;
    }

    .field {
        margin-bottom: 1rem;
    }

    .error-list {
        background: rgba(248,113,113,0.12);
        border: 1px solid rgba(248,113,113,0.35);
        color: var(--red);
        padding: 1rem 1.2rem;
        border-radius: 10px;
        margin-bottom: 1.2rem;
    }

    .field-error {
        color: var(--red);
        display: block;
        font-size: 0.82rem;
        margin-top: 0.25rem;
    }

    .btn {
        padding: 0.7rem 1rem;
        border: 0;
        border-radius: 8px;
        background: var(--accent);
        color: #fff;
        font-weight: 800;
        cursor: pointer;
    }
</style>

<section class="form-card">
    <h1>Queue Assistance Request Form</h1>
    <p class="subtitle">Activity 4: Laravel form handling, validation, error display, and old input retention.</p>

    @if ($errors->any())
        <div class="error-list">
            <strong>Please fix the following errors:</strong>
            <ul style="margin:0.6rem 0 0 1.2rem;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('form.store') }}">
        @csrf

        <div class="field">
            <label for="student_name">Student Name</label>
            <input type="text" id="student_name" name="student_name" value="{{ old('student_name') }}">
            @error('student_name')
                <span class="field-error">{{ $message }}</span>
            @enderror
        </div>

        <div class="field">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <span class="field-error">{{ $message }}</span>
            @enderror
        </div>

        <div class="field">
            <label for="student_number">Student Number</label>
            <input type="number" id="student_number" name="student_number" value="{{ old('student_number') }}">
            @error('student_number')
                <span class="field-error">{{ $message }}</span>
            @enderror
        </div>

        <div class="field">
            <label for="service_type">Service Type</label>
            <select id="service_type" name="service_type">
                <option value="">Select a service</option>
                <option value="Registrar Service" @selected(old('service_type') === 'Registrar Service')>Registrar Service</option>
                <option value="Cashier Service" @selected(old('service_type') === 'Cashier Service')>Cashier Service</option>
                <option value="Library Clearance" @selected(old('service_type') === 'Library Clearance')>Library Clearance</option>
                <option value="Guidance Consultation" @selected(old('service_type') === 'Guidance Consultation')>Guidance Consultation</option>
                <option value="ID Replacement" @selected(old('service_type') === 'ID Replacement')>ID Replacement</option>
            </select>
            @error('service_type')
                <span class="field-error">{{ $message }}</span>
            @enderror
        </div>

        <div class="field">
            <label for="preferred_date">Preferred Date</label>
            <input type="date" id="preferred_date" name="preferred_date" value="{{ old('preferred_date') }}">
            @error('preferred_date')
                <span class="field-error">{{ $message }}</span>
            @enderror
        </div>

        <div class="field">
            <label for="priority_level">Priority Level</label>
            <select id="priority_level" name="priority_level">
                <option value="">Select priority</option>
                <option value="Regular" @selected(old('priority_level') === 'Regular')>Regular</option>
                <option value="Urgent" @selected(old('priority_level') === 'Urgent')>Urgent</option>
                <option value="Scheduled" @selected(old('priority_level') === 'Scheduled')>Scheduled</option>
            </select>
            @error('priority_level')
                <span class="field-error">{{ $message }}</span>
            @enderror
        </div>

        <div class="field">
            <label for="message">Request Details</label>
            <textarea id="message" name="message">{{ old('message') }}</textarea>
            @error('message')
                <span class="field-error">{{ $message }}</span>
            @enderror
        </div>

        <button class="btn" type="submit">Submit Request</button>
    </form>
</section>
@endsection
