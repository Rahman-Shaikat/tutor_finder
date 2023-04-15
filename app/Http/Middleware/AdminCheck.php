<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(session()->get('loginId')){
            $user = User::findOrFail(session()->get('loginId'));
            if($user){
                if(!$user->is_admin){
                    return $next($request);
                }
                if(!$user->is_tutor){
                    return redirect('/tutor/dashboard');
                }
                return redirect('/student/dashboard');
            }
            return redirect('/');
        }
        return redirect('/');
    }
}
