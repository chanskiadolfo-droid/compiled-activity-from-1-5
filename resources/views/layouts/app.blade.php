<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Queue Reservation System</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --bg: #0a0a0f;
            --surface: #12121a;
            --card: #1a1a26;
            --border: #2a2a3d;
            --accent: #6c63ff;
            --text: #e8e8f0;
            --muted: #7a7a9a;
            --green: #4ade80;
            --yellow: #facc15;
            --red: #f87171;
            --blue: #60a5fa;
        }

        body {
            background:
                radial-gradient(circle at top left, rgba(108, 99, 255, 0.18), transparent 28rem),
                radial-gradient(circle at bottom right, rgba(255, 101, 132, 0.12), transparent 26rem),
                var(--bg);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
        }

        nav {
            background: rgba(18, 18, 26, 0.94);
            border-bottom: 1px solid var(--border);
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-height: 64px;
            gap: 1rem;
        }

        .nav-brand {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 1.15rem;
            color: var(--accent);
            letter-spacing: -0.02em;
            text-decoration: none;
        }

        .nav-brand span {
            color: var(--text);
        }

        .nav-links {
            display: flex;
            gap: 0.7rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .nav-link {
            color: var(--muted);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            padding: 0.4rem 1rem;
            border-radius: 6px;
            border: 1px solid var(--border);
            transition: all 0.2s;
        }

        .nav-link:hover {
            color: var(--text);
            border-color: var(--accent);
            background: rgba(108, 99, 255, 0.1);
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
        }

        .alert {
            padding: 0.9rem 1.2rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            background: rgba(74, 222, 128, 0.1);
            border: 1px solid rgba(74, 222, 128, 0.3);
            color: var(--green);
        }

        @media (max-width: 700px) {
            nav {
                padding: 0.9rem 1rem;
                align-items: flex-start;
                flex-direction: column;
            }

            .container {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
<nav>
    <a class="nav-brand" href="{{ route('reservations.index') }}">
        Queue <span>Reservation</span>
    </a>

    <div class="nav-links">
        <a class="nav-link" href="{{ route('reservations.index') }}">CRUD System</a>
        <a class="nav-link" href="{{ route('items.index') }}">Info Items</a>
        <a class="nav-link" href="{{ route('form.create') }}">Input Form</a>
        <a class="nav-link" href="{{ route('reservations.create') }}">New Reservation</a>
    </div>
</nav>

<main class="container">
    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    @yield('content')
</main>
</body>
</html>
