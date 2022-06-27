<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestID
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()){
            if (!$request->session()->exists('guestID')){
                //$request->session()->put('guestID', Str::random(40));
                session(['guestID' => Str::random(40)]);
            }
            //dd(session()->all());
        }
        return $next($request);
    }
}
