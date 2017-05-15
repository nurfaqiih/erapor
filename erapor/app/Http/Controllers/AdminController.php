<?php namespace App\Http\Controllers;

use App\Activity;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Student;
use App\Teacher;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class AdminController
 *
 * @package App\Http\Controllers
 */
class AdminController extends Controller
{
    /**
     * Menampilkan home page administrator
     *
     * @return Response
     */
    public function index()
    {
        return view('user.admin.index');
    }

    /**
     * Menampilkan halaman master data user
     *
     * @return \Illuminate\View\View
     */
    public function user()
    {
        $users = User::with(['teacher', 'student'])->get();

        return view('user.admin.user', compact('users'));
    }

    /**
     * Display all chart
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $admin = User::where('role', 1)->count();
        $op = User::where('role', 2)->count();
        $kepala = User::where('role', 3)->count();
        $student = User::where('role', 5)->count();
        $teacher = User::where('role', 4)->count();
        $chart = [
            'admin' => $admin,
            'op' => $op,
            'kepala' => $kepala,
            'student' => $student,
            'teacher' => $teacher,            
        ];

        $feeds = Activity::with('user', 'subject')->take(10)->latest()->get();

        return view('user.admin.dashboard', compact('feeds', 'chart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('user.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $user = User::create([
            'username'  => $request->input('username'),
            'password'  => bcrypt($request->input('username')),
            'role'      => $request->input('role'),
            'email'     => '',
            'thumbnail' => '/profiles/default.jpg'
        ]);

        if ($request->get('role') == 4) {
            $user->teacher()->create([
                'nip'       => $request->input('username'),
                'course_id' => $request->input('course'),
                'name'      => $request->input('username')
            ]);
        } elseif ($request->get('role') == 5) {
            $user->student()->create([
                'name' => $request->input('username'),
                'nis'  => $request->input('username')
            ]);
        }

        flash()->success('Berhasil menambahkan user');

        return redirect(route('admin.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = User::with(['student', 'teacher'])->find($id);

        return view('user.admin.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('user.admin.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        //      Import image file to public direrctory
        if ($request->hasFile('thumbnail')) {
            $file = \Input::file('thumbnail');
            $name = time() . '-' . \Auth::user()->username . '.' . $file->getClientOriginalExtension();
            $file->move(public_path().'/profiles/', $name);

            User::find($id)->update([
                'thumbnail' => '/profiles/'.$name // save into users table as image path
            ]);
        }

        User::find($id)->update([
            'username'  => $request->input('username'),
            'role'      => $request->input('role'),
            'email'     => $request->input('email')
        ]);

        if ($request->input('role') == 4) {
            User::find($id)->teacher()->update([
                'nip'       => $request->input('username'),
                'course_id' => $request->input('course')
            ]);
        } elseif ($request->input('role') == 5) {
            User::find($id)->student()->update([
                'nis' => $request->input('username')
            ]);
        }


        flash()->success('Berhasil Mengubah User');

        return redirect()->route('admin.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect(route('admin.index'));
    }
    /**
     * Menghapus lebih dari satu data pengguna dalam satu http request
     *
     * @return kehalaman admin user
     */
    public function delete () {
        //code...
        User::destroy(Input::get('checked'));
        flash()->success('Berhasil menghapus user');

        return redirect(route('admin.user'));
    }
}
