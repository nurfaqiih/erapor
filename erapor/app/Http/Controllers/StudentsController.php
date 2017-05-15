<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Kelas;
use App\Section;
use App\Student;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentsController extends Controller {

    protected $student;

    public function __construct()
    {
        $this->student = Student::with(['user', 'rombel'])->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $students = $this->student;
        $lists = Student::distinct()->orderBy('bp')->lists('bp');

        return view('user.operator.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('user.operator.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateStudentRequest $request)
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
            'username'  => $request->input('nis'),
            'role'      => 5,
            'password'  => bcrypt($request->input('nis')),
            'thumbnail' => '/profiles/' . $name

        ]);

        $user->student()->create([
            'name'        => $request->input('name'),
            'nis'         => $request->input('nis'),
            'birth'       => $request->input('birth'),
            'birth_place' => $request->input('birth_place'),
            'gender'      => $request->input('gender'),
            'bp'          => $request->input('bp')
        ]);

        flash()->success('Berhasil menambahkan peserta didik');

        return redirect()->route('students.index');
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
        $student = $this->student->find($id);
        $rombel_id = [];
        foreach ($student->rombel as $rombel)
        {
            $rombel_id [] = $rombel->id;
        }
        $sections = Section::with('teacher', 'rombel')->whereIn('rombel_id', $rombel_id)->get();

        return view('user.operator.student.show', compact('student', 'sections'));
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
        $student = $this->student->find($id);

        return view('user.operator.student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update($id, UpdateStudentRequest $request)
    {
        $path = public_path() . '/profiles/';
        $file = \Request::file('thumbnail');
        $name = time() . '-' . $request->input('nip') . '.' . $file->getClientOriginalExtension();
        if (\Request::hasFile('thumbnail'))
        {
            $file->move($path, $name);
        }
        User::find($request->input('user_id'))->update([
            'username'  => $request->input('nis'),
            'thumbnail' => '/profiles/' . $name
        ]);

        Student::find($id)->update($request->all());

        flash()->success('Berhasil mengubah peserta didik');

        return redirect()->route('students.show', ['id' => $id]);
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
        Student::destroy($id);
        flash()->success('Peserta Didik berhasil di hapus.');

        return redirect()->route('students.index');
    }

}
