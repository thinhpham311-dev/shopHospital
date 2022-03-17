<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminLoginMiddleware
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
        
        if(Auth::guard('account')->check())
        {
            $user =Auth::guard('account')->user();
            if($user->right==1)
            {

                    return $next($request);
            }
            else
            {
                return redirect('admin/login');
            }

        }
        else
        {
            return redirect('admin/login');
        }
    }
}
