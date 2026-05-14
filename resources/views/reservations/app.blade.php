<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Queue Reservation System</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet"/>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg: #0a0a0f;
            --surface: #12121a;
            --card: #1a1a26;
            --border: #2a2a3d;
            --accent: #6c63ff;
            --accent2: #ff6584;
            --text: #e8e8f0;
            --muted: #7a7a9a;
            --green: #4ade80;
            --yellow: #facc15;
            --red: #f87171;
            --blue: #60a5fa;
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
        }

        nav {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
        }

        .nav-brand {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 1.2rem;
            color: var(--accent);
            letter-spacing: -0.02em;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .nav-brand span { color: var(--text); }

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
            background: rgba(108,99,255,0.1);
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
            background: rgba(74,222,128,0.1);
            border: 1px solid rgba(74,222,128,0.3);
            color: var(--green);
        }

        @media (max-width: 600px) {
            nav { padding: 0 1rem; }
            .container { padding: 1rem; }
        }
    </style>
</head>
<body>
<nav>
    <a class="nav-brand" href="{{ route('reservations.index') }}">⬡ <span>Queue</span>Sys</a>
    <a class="nav-link" href="{{ route('reservations.create') }}">+ New Reservation</a>
</nav>
<div class="container">
    @if(session('success'))
        <div class="alert">✓ {{ session('success') }}</div>
    @endif
    @yield('content')
</div>
</body>
</html>

