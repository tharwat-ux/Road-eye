<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = auth()->user();
    
        if(!$user and $role != 'guest'){
            return redirect()->route('login')->with('error' ,'You should login to continue');
        }

        if($user and $role == 'guest')
        {
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('admin.profile', ['id' =>auth()->user()->id] )->with('success', 'Logged in successfully!  , welcome back');
                case 'superadmin':
                    return redirect()->route('admins.control')->with('success', 'Logged in successfully!  , welcome back');
                case 'user':
                    return redirect()->route('UserProfile', ['id' =>auth()->user()->id] )->with('success', 'Logged in successfully!  , welcome back');
                default:
                    Auth::logout();
                    return redirect('/login')->withErrors(['credentials' => 'Unrecognized Role']);
            }
        }

        if($user and $role != auth()->user()->role and $role!='notguest' ){
            abort(403, 'You are not authoriaed to continue .');
        }

        if($user  and  $role == 'guest'){
            return redirect()->route('UserProfile', ['id' =>auth()->user()->id] );
        }

        return $next($request);
    }

}
