<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectBasedOnRole
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = \Illuminate\Support\Facades\Auth::user();

        if ($user) {
            if ($user->role === 'reader') {
                return redirect()->route('books.index');
            } elseif (in_array($user->role, ['author', 'admin'])) {
                return redirect()->route('books.index'); // or another page
            }
        }

        return $next($request);
    }
}
