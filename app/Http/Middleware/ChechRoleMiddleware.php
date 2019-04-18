<?php

namespace App\Http\Middleware;

use Closure;

class ChechRoleMiddleware
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
        if($request->session()->has('user')){

            //dd($request->session()->get('user'));
            $user = $request->session()->get('user');
            if($user->nameRole == 'admin'){
                return $next($request);
            } else {
                return redirect('/')->with('error','You do not have the right to access this page!');
            }
        }

        return redirect('/')->with('error','You do not have the right to access this page');
    }
}
