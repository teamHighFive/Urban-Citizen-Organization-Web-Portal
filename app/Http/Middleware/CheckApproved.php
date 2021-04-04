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
            $not_active = Auth::user()->status == '0';
            Auth::logout();

            if($not_active == 1) {
                $message = 'Your account is waiting for our administrator approval. Please verify you email after admin approvel. Please check back later. Thank You...';

            }
            return redirect()->route('login')
            ->with('status',$message)
            ->withErrors(['email' => 'Your account still Not Actived. Please contact Administrator.']);
        }


        return $next($request);
    }
}
