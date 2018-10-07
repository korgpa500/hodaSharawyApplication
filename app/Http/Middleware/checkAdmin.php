<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class checkAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!(Auth::user())) return redirect()->route('welcome');

        else if(User::find(Auth::user()->type->type_name != "Admin")) return redirect()->route('home');

        return $next($request);
    }
}
