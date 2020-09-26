<?php

namespace App\Http\Middleware;

use Closure;

class Administrator
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
        // Create a custom config file => because we dont want to save data in database ...
        if (auth()->check()) {
            if (auth()->user()->isAdmin()) {
                return $next($request);
            } else {
                session()->flash('خطا', 'شما به این بخش دسترسی ندارید.');
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
        return $next($request);
    }
}
