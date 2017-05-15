<?php namespace App\Http\Middleware;

use Closure;

class ValidMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

        $response = $next($request);

        if(auth()->check()){
            if(\Auth::user()->email != null){
                return redirect()->back();
            }
        }

        return $response;
	}

}
