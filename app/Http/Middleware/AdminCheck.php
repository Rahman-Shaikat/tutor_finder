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
                if($user->is_tutor==0 && $user->is_admin==1){
                    return $next($request);
                }else if($user->is_tutor == 1 && !$user->is_admin){
                    return redirect('/tutor/dashboard');
                }else if($user->is_tutor == 0 && !$user->is_admin){
                    return redirect('/student/dashboard');
                }
            }
            return redirect('/');
        }
        return redirect('/');
    }
}
