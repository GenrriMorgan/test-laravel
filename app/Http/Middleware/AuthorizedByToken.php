<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthorizedByToken
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     *
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->expectsJson() && $request->header('x-auth-token')) {

            $user = User::where('token', $request->header('x-auth-token'))->first();

            if ($user) {
                Auth::login($user);

                return $next($request);
            }
        }

        return response()->json('Not Authorized', 401);
    }
}
