<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Section;
use App\Student;
use Carbon\Carbon;


class StudentController extends Controller {

    protected $rombel;

    public function __construct()
    {
        $year = $this->tahunAjar();

        $this->rombel = Student::find(\Auth::user()->student->id)->rombel()->where('year', \Config::get('kalender.year'))->first();
    }

    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('user.student.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function course()
    {
        if ($this->rombel == null) {
            return view('user.student.course-empty');
        }
        $sections = Section::with('teacher')->where('rombel_id', $this->rombel->id)->get();
        
        return view('user.student.course', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\View\View
     */
    public function historis()
    {
        return view('user.student.historis-rapor');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function rapor()
    {
        $sections = Section::with([
            'teacher',
            'rombel',
            'rapor' => function ($query)
            {
                $query->where('student_id', \Auth::user()->student->id);
            }
        ])->where('rombel_id', $this->rombel->id)->get();
        $rombel = $this->rombel;


        return view('user.student.rapor', compact('sections', 'rombel'));
    }

    /**
     * @return string
     */
    public function tahunAjar()
    {
        if (Carbon::now()->month > 6)
        {

            $year = Carbon::now()->year . '/' . (Carbon::now()->year + 1);
            $semester = 1;

            return $year;
        } else
        {
            $year = (Carbon::now()->year - 1) . '/' . Carbon::now()->year;
            $semester = 2;

            return $year;
        }
    }

}
