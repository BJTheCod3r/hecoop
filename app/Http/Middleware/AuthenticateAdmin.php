<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;
use App\Models\User;

class AuthenticateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $user = $request->user();

        if (!$user) {
            throw new UnauthorizedException('User is not signed in!');
        }

        if ($user->role !== User::ROLE_ADMIN) {
            throw new UnauthorizedException('User is not an admin');
        }

        return $next($request);
    }
}
