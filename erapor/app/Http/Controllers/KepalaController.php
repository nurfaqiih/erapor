<?php namespace App\Http\Controllers;

use App\Kelas;
use App\Course;
use App\Rombel;
use App\Student;
use App\Teacher;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class KepalaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('user.kepala.index');
	}

    /**
     * Menampilkan data semua pendidik
     *
     * @return \Illuminate\View\View
     */
    public function teacher()
    {
        $teachers = Teacher::with('course', 'section', 'rombel', 'user')->get();

        return view('user.kepala.teacher', compact('teachers'));
	}

    /**
     * Menampilkan data semua Peserta Didik
     *
     * @return \Illuminate\View\View
     */
    public function student()
    {
        $students = Student::with('user')->get();

        return view('user.kepala.student', compact('students'));
    }

    /**
     * Menampilkan Data Semua Kelas
     *
     * @return \Illuminate\View\View
     */
    public function kelas()
    {
        $kelas = Kelas::with('rombel', 'section')->get();

        return view('user.kepala.kelas', compact('kelas'));
    }

    /**
     * Menampikan data Semua Mata Pelajaran
     *
     * @return \Illuminate\View\View
     */
    public function course()
    {
        $courses = Course::with('teacher')->get();

        return view('user.kepala.course', compact('courses'));
    }

    public function rapor (){
        return view('user.kepala.rapor');
    }

    public function year(){
        return \DB::table('rapors')->select('year', 'rombel_id')->distinct()->get();
    }

    public function rombel(){
        return response()->json(Rombel::where('year', \Input::get('year'))->get(['id', 'name']));
    }

    public function result($id){
        return  Rombel::with('kelas', 'student', 'section', 'teacher')->find($id);
    }
}
