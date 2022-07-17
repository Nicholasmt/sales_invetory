<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SellerAuth
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
        if($request->session()->get('user_auth') == true && $request->session()->get('privilege') == 2)
        {
            return $next($request);
        }

        else
        {
            $id = session()->get('id');
            $log = Logs::where('user_id', $id)->where('logout_time', null)->update(['logout_time'=> date("Y:m:d:H:i:s")]);
            return redirect('sign-in')->with('error', 'You are not allowed to view this Resources!');
        }
       
    }
}
