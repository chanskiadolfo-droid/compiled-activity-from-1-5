<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title', 'Skill Exchange') — SkillBridge</title>
    <link href="https://fonts.googleapis.com/css2?family=Clash+Display:wght@400;600;700&family=Satoshi:wght@300;400;500;700&display=swap" rel="stylesheet"/>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --bg: #f5f0e8;
            --surface: #fffdf7;
            --card: #ffffff;
            --border: #e2d9c8;
            --ink: #1a1410;
            --muted: #7a6f62;
            --accent: #d4522a;
            --accent2: #2a7d4f;
            --tag-bg: #fde8df;
            --tag-color: #d4522a;
        }
        body {
            background: var(--bg);
            color: var(--ink);
            font-family: 'Satoshi', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        header {
            background: var(--ink);
            color: #fff;
            padding: 0 2.5rem;
            height: 68px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .brand {
            font-family: 'Clash Display', sans-serif;
            font-size: 1.3rem;
            font-weight: 700;
            color: #fff;
            text-decoration: none;
            letter-spacing: -0.02em;
        }
        .brand span { color: #f4a87c; }
        .nav-tag {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            color: rgba(255,255,255,0.7);
            padding: 0.35rem 0.9rem;
            border-radius: 20px;
            font-size: 0.8rem;
        }
        main { flex: 1; max-width: 1080px; margin: 0 auto; width: 100%; padding: 2.5rem 1.5rem; }
        footer {
            background: var(--ink);
            color: rgba(255,255,255,0.4);
            text-align: center;
            padding: 1.2rem;
            font-size: 0.8rem;
        }
        footer strong { color: rgba(255,255,255,0.7); }
    </style>
    @yield('styles')
</head>
<body>
<header>
    <a class="brand" href="/skills">Skill<span>Bridge</span></a>
    <span class="nav-tag">Student Skill Exchange</span>
</header>
<main>
    @yield('content')
</main>
<footer>
    &copy; {{ date('Y') }} <strong>SkillBridge</strong> — Student Skill Exchange Management System
</footer>
</body>
</html>
