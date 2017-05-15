<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;

class RedirectIfAuthenticated {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($this->auth->check())
		{
            $role = \Auth::User()->role;
            if ($role == 1)
            {
                return redirect()->intended(route('admin.index'));
            } elseif ($role == 2)
            {
                return redirect()->intended(route('operator.index'));
            } elseif ($role == 3)
            {
                return redirect()->intended(route('kepala.index'));
            } elseif ($role == 4)
            {
                return redirect()->intended(route('teacher.index'));
            } elseif ($role == 5)
            {
                return redirect()->intended(route('student.index'));
            }
		}

		return $next($request);
	}

}
