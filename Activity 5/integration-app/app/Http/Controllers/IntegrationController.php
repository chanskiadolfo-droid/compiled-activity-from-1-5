<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class IntegrationController extends Controller
{
    public function admin(Request $request)
    {
        return $this->dashboard($request, 'admin');
    }

    public function user(Request $request)
    {
        return $this->dashboard($request, 'user');
    }

    private function dashboard(Request $request, string $dashboardRole)
    {
        $search = $request->search;

        $localUsers = User::when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('role', 'like', "%{$search}%");
        })
            ->orderBy('id', 'asc')
            ->get();

        $apiUsers = [];
        $apiError = null;

        try {
            $token = $request->user()->createToken('dashboard-token')->plainTextToken;

            $apiUsersResponse = Http::withToken($token)
                ->timeout(5)
                ->get(url('/api/secure/users'), [
                    'search' => $search,
                ]);

            if ($apiUsersResponse->successful()) {
                $apiUsers = $apiUsersResponse->json();
            } else {
                $apiError = 'Own secure API request failed. Status: ' . $apiUsersResponse->status();
            }
        } catch (\Exception $e) {
            $apiError = 'Own secure API is unavailable right now.';
        }

        try {
            $posts = Cache::remember('jsonplaceholder_posts', 60, function () {
                return Http::timeout(5)
                    ->get('https://jsonplaceholder.typicode.com/posts')
                    ->throw()
                    ->json();
            });

            $posts = collect($posts)->take(8);
            $publicApiError = null;
        } catch (\Exception $e) {
            $posts = collect();
            $publicApiError = 'Public API is unavailable right now.';
        }

        return view('dashboard.integration', [
            'dashboardRole' => $dashboardRole,
            'localUsers' => $localUsers,
            'apiUsers' => $apiUsers,
            'posts' => $posts,
            'search' => $search,
            'apiError' => $apiError,
            'publicApiError' => $publicApiError,
        ]);
    }
}
