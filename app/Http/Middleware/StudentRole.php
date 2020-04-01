<?php

namespace App\Http\Middleware;

use Closure;

class StudentRole
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
         $user = $request->user();

        if ($user->role_id == 2)
        {
            return redirect('/account/gymowner');
        }
        return $next($request);
    }
}
