<?php namespace App\Http\Middleware;

use Closure;

class OperatorMiddleware
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
        if (\Auth::check()) {
            # code...
            if (\Auth::User()->role != 2) {
                return redirect()->route('forbidden');
            }
        } elseif (\Auth::guest()) {
            # code...
            return redirect('/auth/login');
        }

        return $next($request);
    }
}
