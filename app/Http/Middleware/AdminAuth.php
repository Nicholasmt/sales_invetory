<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
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

        if($request->session()->get('user_auth') == true && $request->session()->get('privilege') == 1)
        {
            return $next($request);
        }

        else
        {
         return redirect('sign-in')->with('error', 'You are Not Allowed to View This Resources!');
        }
      
    }
}
