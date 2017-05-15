<?php namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;

class Available {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$open = Config::get('kalender.open');
        $now = Carbon::now()->format('Y-m-d');
		if ($now < $open) {
			return redirect()->route('available');
		}
		return $next($request);
	}

}
