<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title', 'Workshop Registration')</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"/>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --bg: #f0f4ff;
            --card: #ffffff;
            --border: #dde3f0;
            --ink: #0f1623;
            --muted: #6b7a99;
            --accent: #4361ee;
            --accent-light: #eef1fd;
            --success: #2ec4b6;
            --danger: #e63946;
            --danger-light: #fff0f1;
            --yellow: #f4a261;
        }
        body {
            background: var(--bg);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--ink);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        header {
            background: var(--ink);
            padding: 0 2rem;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .brand {
            font-size: 1.1rem;
            font-weight: 800;
            color: #fff;
            letter-spacing: -0.02em;
        }
        .brand span { color: #7b9cff; }
        .header-tag {
            font-size: 0.75rem;
            color: rgba(255,255,255,0.5);
            border: 1px solid rgba(255,255,255,0.15);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
        }
        main { flex: 1; padding: 2.5rem 1.5rem; }
        footer {
            text-align: center;
            padding: 1.2rem;
            font-size: 0.78rem;
            color: var(--muted);
            background: #fff;
            border-top: 1px solid var(--border);
        }
    </style>
    @yield('styles')
</head>
<body>
<header>
    <div class="brand">Workshop<span>Reg</span></div>
    <span class="header-tag">Registration Portal</span>
</header>
<main>
    @yield('content')
</main>
<footer>
    &copy; {{ date('Y') }} WorkshopReg — Individual Activity 4 | Laravel Form Handling & Validation
</footer>
</body>
</html>
