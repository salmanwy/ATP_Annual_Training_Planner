<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle(Request $request, Closure $next) {

        if(!session()->has('LoggedUser') && ( $request->path()!='login'  && $request->path()!='register' && $request->path()!='/'  )){
                return redirect('login')->with('fail','You must be logged in');
        }

        if(session()->has('LoggedUser') && session()->get('type')== 'user'){

            if(  ( $request->path() =='admin/dashboard' || $request->path() =='login'  || $request->path() =='register' || $request->path() =='/'  )){
                return back();
        }


        }  

        if(session()->has('LoggedUser') && ( $request->path() =='login'  || $request->path() =='register' || $request->path() =='/' )){
                return back();
        }

         if( session()->has('LoggedUser') && session()->get('type')== 'admin' && ( $request->path() =='login'  || $request->path() =='register' || $request->path() =='/' )){
                return back();
        }

        

         if( session()->has('LoggedUser') && session()->get('type')== 'user' && ( $request->path() =='login'  || $request->path() =='register' || $request->path() =='/' )){
                return back();
        }

        return $next($request)->header('Cache-control','no-cache, no-store, max-age=0, must-revalidate')
            ->header('Pragma','no-cache')
            ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');

    }


    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
