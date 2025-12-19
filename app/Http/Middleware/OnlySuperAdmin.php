<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Session;

class OnlySuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Allow super admin as well as moderator to access settings
        if(!(Session::has('superAdmin') || Session::has('modarator'))){
            return redirect()->route('adminLogin')->with('error','Please login to continue');
        }
        return $next($request);
    }
}
