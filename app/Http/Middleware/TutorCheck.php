<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TutorCheck
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
                if($user->is_tutor==1 && !$user->is_admin){
                    return $next($request);
                }else if($user->is_tutor == 0 && !$user->is_admin){
                    return redirect('/student/dashboard');
                }else if($user->is_tutor == 0 && $user->is_admin){
                    return redirect('/admin/dashboard');
                }
            }
            return redirect('/');
        }
        return redirect('/');
    }
}
