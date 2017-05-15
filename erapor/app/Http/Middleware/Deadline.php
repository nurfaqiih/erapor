<?php namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;

class Deadline {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$deadline = Config::get('kalender.expire');
        $now = Carbon::now()->format('Y-m-d');
		if ($now > $deadline) {
			return redirect()->route('expire');
		}
		return $next($request);
	}

}
