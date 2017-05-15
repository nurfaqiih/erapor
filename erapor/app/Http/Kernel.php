<?php namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {

    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
        'Illuminate\Cookie\Middleware\EncryptCookies',
        'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
        'Illuminate\Session\Middleware\StartSession',
        'Illuminate\View\Middleware\ShareErrorsFromSession',
        'App\Http\Middleware\VerifyCsrfToken',
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth'       => 'App\Http\Middleware\Authenticate',
        'email'      => 'App\Http\Middleware\EmailNullMiddleware',
        'valid'      => 'App\Http\Middleware\ValidMiddleware',
        'auth.basic' => 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
        'guest'      => 'App\Http\Middleware\RedirectIfAuthenticated',
        'role'       => 'App\Http\Middleware\RoleCheckMiddleware',
        'admin'      => 'App\Http\Middleware\AdminMiddleware',
        'op'         => 'App\Http\Middleware\OperatorMiddleware',
        'kepala'     => 'App\Http\Middleware\KepalaMiddleware',
        'teacher'    => 'App\Http\Middleware\TeacherMiddleware',
        'student'    => 'App\Http\Middleware\StudentMiddleware',
        'expire'     => 'App\Http\Middleware\Deadline',
        'available'  => 'App\Http\Middleware\Available',
    ];

}
