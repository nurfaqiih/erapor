<?php namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CourseRequest;
use App\Teacher;
use Illuminate\Http\Request;

class CoursesController extends Controller {

    /**
     * @var \Illuminate\Database\Eloquent\Builder|static
     */
    protected $course;

    /**
     *
     */
    public function __construct()
    {
        $this->course = Course::with('teacher')->get();
	}

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $courses = $this->course;

		return view('user.operator.course.index', compact('courses'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('user.operator.course.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CourseRequest $request, Course $course)
	{
        $course->create($request->except('code'));
        flash()->success('Berhasil menambah mata pelajaran');

        return redirect()->route('course.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$course = $this->course->find($id);

        return view('user.operator.course.show', compact('course'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$course = $this->course->find($id);

        return view('user.operator.course.edit', compact('course'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$this->course->find($id)->update($request->all());
        flash()->success('Berhasil mengubah mata pelajaran');

        return redirect()->route('course.show', $id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->course->find($id)->delete();
        flash()->success('Berhasil menghapus mata pelajaran');

        return redirect()->route('course.index');
	}

}
