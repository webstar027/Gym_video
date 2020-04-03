<?php

namespace App\Http\Middleware;

use Closure;

class AdminRole
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

        if ($user->role_id == 1)
        {
            return redirect('/admin/memberactivity');
        }
        return $next($request);
    }
}
