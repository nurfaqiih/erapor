<?php namespace App\Http\Controllers;

use App\Rapor;
use App\Rombel;
use App\Section;
use App\Student;
use App\Teacher;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\RaporRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Part\DefineTahunAjar;

class TeacherController extends Controller {

    use DefineTahunAjar;

    protected $rombel, $year, $semester;

    public function __construct(Rombel $rombel)
    {
        $this->rombel = $rombel->with('teacher', 'student', 'section', 'kelas');
        $this->year = \Config::get('kalender.year');
        $this->semester = \Config::get('kalender.semester');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('user.teacher.index', compact('teacher'));
    }

    public function akademik()
    {
        $teacher = Teacher::with('user', 'course', 'section')->where('user_id', \Auth::user()->id)->first();

        return view('user.teacher.akademik', compact('teacher'));
    }

    public function walas()
    {
        $rombel = $this->rombel->where('teacher_id', \Auth::user()->teacher->id)->where('year', $this->year)->first();
        $semester = $this->semester;

        return view('user.teacher.walas.teacher', compact('rombel', 'semester'));
    }

    public function editKenaikan ()
    {
        $rombel = $this->rombel->where('teacher_id', \Auth::user()->teacher->id)->where('year', $this->year)->first();
        $semester = $this->semester;

        return view('user.teacher.walas.kenaikan', compact('rombel', 'semester'));
    }

    public function updateKenaikan(Request $request){
        $students = Student::find($request->get('id'));
        $tingkat  = $request->get('tingkat');
        $jurusan  = $request->get('jurusan');
        $kelas = '';
        if ($tingkat == 'X') {
            $kelas = 'XI'.' '.$jurusan;
        }elseif ($tingkat == 'XI') {
            $kelas = 'XII'.' '.$jurusan;
        }

        foreach ($students as $student) {
            $student->update([
                'kelas' => $kelas
            ]);
        }

        return redirect()->route('teacher.edit.kenaikan');
    }

    public function section($id)
    {
        $section = Section::with('teacher', 'rombel')->find($id);
        $green = '<i style="color: green">Selesai</i>';
        $blue = '<i style="color: blue">Dalam Proses </i>';
        $red = '<i style="color: red">Belum diisi</i>';
        $rapors  = Rapor::with('student', 'section')->where('section_id', $id)->where('semester', \Config::get('kalender.semester'))->get();

        return view('user.teacher.section', compact('section', 'rapors','green', 'blue', 'red'));
    }

    public function rapor($student_id, $section_id)
    {
        $rapor = Rapor::with('student', 'section')->where('student_id', $student_id)->where('semester', \Config::get('kalender.semester'))->section($section_id)->first();
        $student = Student::find($student_id);

        return view('user.teacher.lihat-nilai', compact('rapor', 'student'));
    }
    
}
