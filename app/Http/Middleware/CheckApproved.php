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
            Auth::logout();

            if($user['email_verified_at']== null){
                $message = 'Your verification mail has been sent to your email. Please verify it as soon as possible...';
            }else{
                $message = 'Your account is waiting for our administrator approval. Please check back later. Thank You...';
            }
            return redirect()->route('login')
            ->with('status',$message)
            ->withErrors(['email' => 'Your account Still Not Actived. Please contact Administrator.']);
        }else if($user['status'] == '1'){

            if($user['email_verified_at']== null){
                Auth::logout();
                $message = 'Your verification mail has been sent to your email. Please verify it as soon as possible...';

                return redirect()->route('login')
                ->with('status',$message)
                ->withErrors(['email' => 'Your account Still Not Actived. Please contact Administrator.']);
            }

        }

        return $next($request);
    }
}
