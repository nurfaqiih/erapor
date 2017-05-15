<?php namespace App\Providers;

use App\Activity;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeYear();

        $this->composeInfoBox();

        $this->composeProfile();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function composeYear()
    {
        \View::composer([
            'user.operator.section.index',
            'user.operator.section.create',
            'user.operator.rombel.create',
            'user.operator.rombel.show',
            'partials.rapor.rapor',
            'user.student.course',
            'user.student.rapor',
            'user.student.print',
        ], function ($view)
        {
            $y = Carbon::now()->year - 1;
            $x = Carbon::now()->year + 1;

            if (Carbon::now()->month > 6)
            {

                $year = Carbon::now()->year . '/' . $x;
                $semester = 1;
            } else
            {
                $year = $y . '/' . Carbon::now()->year;
                $semester = 2;
            }


            $view->with([
                'year'     => $year,
                'semester' => $semester
            ]);
        });
    }

    private function composeInfoBox()
    {
        \View::composer(['partials.info-box'], function ($view)
        {
            $user = User::all();

            $teacher = $user->where('role', 4)->count();
            $student = $user->where('role', 5)->count();
            $activity = Activity::all()->count();

            $view->with([
                'user'    => $user->count(),
                'teacher' => $teacher,
                'student' => $student,
                'activity' => $activity
            ]);
        });
    }

    private function composeProfile()
    {
        \View::composer(['partials.profile.layout'], function ($view)
        {
            $role = \Auth::user()->role;
            if ($role == 1)
            {
                $name = 'Administrator';
                $gender = 1;
            } elseif ($role == 2)
            {
                $name = 'Operator';
                $gender = 1;
            } elseif ($role == 3)
            {
                $name = \Auth::user()->name;
                $gender = \Auth::user()->gender;
            } elseif ($role == 4)
            {
                $name = \Auth::user()->name;
                $gender = \Auth::user()->gender;
            } elseif ($role == 5)
            {
                $name = \Auth::user()->name;
                $gender = \Auth::user()->gender;
            }

            $view->with([
                'name'   => $name,
                'gender' => $gender
            ]);
        });
    }

}
