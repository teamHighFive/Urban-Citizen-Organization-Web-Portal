<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckApproved
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
        $user = Auth::user();
        if($user['status'] == '0')
        {
            $active = Auth::user()->status == '0';
            Auth::logout();
            // return redirect()->route('login');
            // return redirect()->route('approval');
            if($active == 1) {
                $message = 'Your account is waiting for our administrator approval.Please check back later.';

            }
            return redirect()->route('login')
            ->with('status',$message)
            ->withErrors(['email' => 'Your account still Not actived. Please contact Administrator.']);
            // return redirect()->route('login')->with('status','Your account is waiting for our administrator approval.Please check back later.');
        }

        return $next($request);
    }
}
