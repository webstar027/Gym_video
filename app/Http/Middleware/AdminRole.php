<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
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

         if ($user->role_id == 3)
         {
             return redirect(route('student_account'));
         }
         elseif($user->role_id == 2){
            return redirect(route('gymowner_account'));
         }
        return $next($request);
    }
}
