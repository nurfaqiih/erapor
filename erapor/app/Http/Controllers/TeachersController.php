<?php namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;

class TeachersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $teachers = Teacher::with('course')->get();

        return view('user.operator.teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $course = Course::orderBy('type', 'asc')->lists('name', 'id');

        return view('user.operator.teacher.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateTeacherRequest $request)
    {
        $path = public_path() . '/profiles/';
        $file = \Request::file('thumbnail');
        $name = 'default.jpg';
        if (\Request::hasFile('thumbnail'))
        {
            $name = time() . '-' . $request->input('nip') . '.' . $file->getClientOriginalExtension();
            $file->move($path, $name);
        }
        

        $user = User::create([
            'username'  => $request->input('nip'),
            'password'  => bcrypt($request->input('nip')),
            'role'      => 4,
            'thumbnail' => '/profiles/' . $name
        ]);

        $user->teacher()->create([
            'nip'         => $request->input('nip'),
            'course_id'   => $request->input('course_id'),
            'name'        => $request->input('name'),
            'birth'       => $request->input('birth'),
            'birth_place' => $request->input('birth_place'),
            'gender'      => $request->input('gender'),
        ]);

        flash()->success('Berhasil menambahkan pendidik');

        return redirect()->route('teachers.index');
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
        $teacher = Teacher::with('section', 'course', 'user')->find($id);

        return view('user.operator.teacher.show', compact('teacher'));
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
        $teacher = Teacher::with('section', 'course', 'user')->find($id);
        $course = Course::lists('name', 'id');

        return view('user.operator.teacher.edit', compact('teacher', 'course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update($id, UpdateTeacherRequest $request)
    {
        $path = public_path() . '/profiles/';
        $file = \Request::file('thumbnail');
        $name = time() . '-' . $request->input('nip') . '.' . $file->getClientOriginalExtension();
        if (\Request::hasFile('thumbnail'))
        {
            $file->move($path, $name);
        }

        Teacher::find($id)->update([
            'name',
            'nip',
            'birth',
            'birth_place',
            'gender',
            'course_id'
        ]);

        User::find($request->input('user_id'))->update([
            'username'  => $request->input('nip'),
            'thumbnail' => '/profiles/' . $name,
        ]);
        flash()->success('Berhasil mengubah data pendidik');

        return redirect()->route('teachers.show', $id);
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
        Teacher::destroy($id);
        flash()->success('Berhasil menghapus pendidik');

        return redirect()->route('teachers.index');
    }

}
