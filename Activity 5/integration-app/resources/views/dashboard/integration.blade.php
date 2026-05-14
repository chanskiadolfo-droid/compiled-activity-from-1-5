<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ucfirst($dashboardRole) }} Dashboard - Student Integration System
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white p-6 shadow rounded-lg">
                <h3 class="text-lg font-bold mb-3">Logged-in User Profile</h3>
                <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
                <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                <p><strong>Role:</strong> {{ ucfirst(auth()->user()->role) }}</p>
            </div>

            <div class="bg-white p-6 shadow rounded-lg">
                <h3 class="text-lg font-bold mb-3">Search / Filter</h3>

                <form method="GET" action="{{ request()->url() }}" class="flex gap-2">
                    <input
                        type="text"
                        name="search"
                        value="{{ $search }}"
                        placeholder="Search name, email, or role"
                        class="border-gray-300 rounded-md shadow-sm w-full"
                    >

                    <button class="px-4 py-2 bg-blue-600 text-white rounded-md">
                        Search
                    </button>

                    <a href="{{ request()->url() }}" class="px-4 py-2 bg-gray-500 text-white rounded-md">
                        Reset
                    </a>
                </form>
            </div>

            <div class="bg-white p-6 shadow rounded-lg">
                <h3 class="text-lg font-bold mb-3">Users from Local Database</h3>

                <table class="w-full border">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2 text-left">ID</th>
                            <th class="border p-2 text-left">Name</th>
                            <th class="border p-2 text-left">Email</th>
                            <th class="border p-2 text-left">Role</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($localUsers as $user)
                            <tr>
                                <td class="border p-2">{{ $user->id }}</td>
                                <td class="border p-2">{{ $user->name }}</td>
                                <td class="border p-2">{{ $user->email }}</td>
                                <td class="border p-2">{{ ucfirst($user->role) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="border p-2">No users found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="bg-white p-6 shadow rounded-lg">
                <h3 class="text-lg font-bold mb-3">Users from Own Secure API</h3>

                @if($apiError)
                    <div class="bg-red-100 text-red-700 p-3 rounded mb-3">
                        {{ $apiError }}
                    </div>
                @endif

                <table class="w-full border">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2 text-left">ID</th>
                            <th class="border p-2 text-left">Name</th>
                            <th class="border p-2 text-left">Email</th>
                            <th class="border p-2 text-left">Role</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($apiUsers as $user)
                            <tr>
                                <td class="border p-2">{{ $user['id'] }}</td>
                                <td class="border p-2">{{ $user['name'] }}</td>
                                <td class="border p-2">{{ $user['email'] }}</td>
                                <td class="border p-2">{{ ucfirst($user['role']) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="border p-2">No API users found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <p class="text-sm text-gray-500 mt-3">
                    API endpoint used by dashboard: /api/secure/users
                </p>
            </div>

            <div class="bg-white p-6 shadow rounded-lg">
                <h3 class="text-lg font-bold mb-3">External Public API Data</h3>
                <p class="mb-3 text-gray-600">Source: JSONPlaceholder Posts</p>

                @if($publicApiError)
                    <div class="bg-red-100 text-red-700 p-3 rounded mb-3">
                        {{ $publicApiError }}
                    </div>
                @endif

                <div class="grid md:grid-cols-2 gap-4">
                    @forelse($posts as $post)
                        <div class="border p-4 rounded-lg bg-gray-50">
                            <h4 class="font-bold mb-2">{{ $post['title'] }}</h4>
                            <p class="text-sm text-gray-700">{{ $post['body'] }}</p>
                        </div>
                    @empty
                        <p>No external posts available.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
