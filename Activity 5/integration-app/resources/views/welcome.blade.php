<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Integration Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center px-6">
        <div class="max-w-4xl w-full bg-white shadow-lg rounded-2xl p-10">
            <h1 class="text-4xl font-bold text-blue-700 mb-4">
                Student Integration Dashboard
            </h1>

            <p class="text-gray-600 text-lg mb-8">
                A Laravel application with authentication, role-based dashboards, REST API integration, and public API data display.
            </p>

            <div class="grid md:grid-cols-3 gap-4 mb-8">
                <div class="border rounded-xl p-5">
                    <h2 class="font-bold text-gray-800 mb-2">Authentication</h2>
                    <p class="text-sm text-gray-600">
                        Login and registration using Laravel Breeze.
                    </p>
                </div>

                <div class="border rounded-xl p-5">
                    <h2 class="font-bold text-gray-800 mb-2">Own API</h2>
                    <p class="text-sm text-gray-600">
                        Displays users from the system API endpoint.
                    </p>
                </div>

                <div class="border rounded-xl p-5">
                    <h2 class="font-bold text-gray-800 mb-2">Public API</h2>
                    <p class="text-sm text-gray-600">
                        Shows external data from a public API.
                    </p>
                </div>
            </div>

            <div class="flex gap-3">
                @auth
                    <a href="{{ route('dashboard') }}" class="px-5 py-3 bg-blue-600 text-white rounded-lg font-semibold">
                        Go to Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-5 py-3 bg-blue-600 text-white rounded-lg font-semibold">
                        Login
                    </a>

                    <a href="{{ route('register') }}" class="px-5 py-3 bg-gray-800 text-white rounded-lg font-semibold">
                        Register
                    </a>
                @endauth
            </div>
        </div>
    </div>
</body>
</html>
