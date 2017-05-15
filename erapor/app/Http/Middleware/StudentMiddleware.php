<?php namespace App\Http\Middleware;

use Closure;

class StudentMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if(\Auth::User()->role != 5)
        {
            return redirect()->route('forbidden');
        }
		return $next($request);
	}

}
