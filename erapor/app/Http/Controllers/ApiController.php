<?php namespace App\Http\Controllers;

use App\User;
use App\Kelas;
use App\Rapor;
use App\Course;
use App\Rombel;
use App\Section;
use App\Student;
use App\Teacher;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ApiController extends Controller
{
    protected $student_id, $semester;

    public function __construct() {
        $this->student_id = null;
        $this->semester = null;
    }
    
    public function section()
    {
        $teacher = Teacher::where('course_id', Input::get('course_id'))->get();

        return response()->json($teacher);
    }

    public function sectionFetchCourse () {
        $rombel = Rombel::find(Input::get('kelas'));

        if ($rombel->kelas->jurusan == 'IPA') {
            # code...
             return Course::with('teacher')->findMany([1,2,3,4,5,6,7,8,9,10,11,12]);
        } else {
            return Course::with('teacher')->findMany([1,2,3,4,5,6,7,8,9,13,14,15]);
        }
        // return Course::with('teacher')->orderBy('kode')->get();
    }

    public function sectionFetchRombel () {
        if (Input::get('kelas') != null) {
            return Rombel::with('kelas', 'teacher')->find(Input::get('kelas'));
        }
        
        return Rombel::with('kelas', 'teacher')->doesnthave('section')->get();
    }

    public function createRombel()
    {
        $kelas = Kelas::find(Input::get('kelas_id'));
        $filter = $kelas->tingkat.' '.$kelas->jurusan;
        $students = [];
        if ($kelas->tingkat == 'X') {
            $students = Student::where('kelas', $filter)->whereDoesntHave('rombel')->get();    
        }elseif ($kelas->tingkat == 'XI') {
            $students = Student::where('kelas', $filter)->get()->toArray();
        }elseif ($kelas == 'XII') {
            $students = Student::where('kelas', $filter)->get();
        }
        
        return response()->json($students);
    }

    public function teacher()
    {
        return response()->json(Course::all());
    }

    public function nilai($student_id, $section_id)
    {
        $rapor = Rapor::with('student', 'section')->where('student_id', $student_id)->section($section_id)->first();

        return response()->json($rapor);
    }

    /**
    * Method untuk lihat rapor
    * 
    * @return
    */
    public function rapors ($rombel_id, $student_id, $semester) {
        //code...
        $section_id = Input::get('section_id');
        if ($section_id != null) {
            $rapor = Rapor::with('section', 'student')
                    ->where('rombel_id', $rombel_id)
                    ->where('semester', $semester)
                    ->where('student_id', $student_id)
                    ->where('section_id', $section_id)
                    ->orderBy('course_id')
                    ->first();
        } else{
            $rapor = Rapor::with('section', 'student')
                    ->where('rombel_id', $rombel_id)
                    ->where('semester', $semester)
                    ->where('student_id', $student_id)
                    ->orderBy('course_id')
                    ->get();    
        }
        
        return response()->json($rapor);    
    }

    public function fetchLeger ($rombel_id, $semester) {
        $students = Rombel::find($rombel_id)->student_list;
        $rapor = [];
        foreach ($students as $student_id) {
            $rapor[] = Rapor::with('student', 'section')
                    ->where('rombel_id', $rombel_id)
                    ->where('semester', $semester)
                    ->where('student_id', $student_id)
                    ->orderBy('student_id')
                    ->get();
        }

        return response()->json($rapor);    
    }

    public function fetchRombel ($rombel_id, $student_id, $semester) {
        //code...
        $this->student_id = $student_id;
        $this->semester = $semester;
        $rombel = Rombel::with(['student' => function($query){
            $query->where('student_id', $this->student_id);
        }, 'teacher', 'kelas'])->find($rombel_id);
        return response()->json($rombel);
    }

    public function fetchStudent ($student_id) {
        //code...
        $student = Student::with('user')->find($student_id);

        return response()->json($student);
    }

    public function fetchTeachers()
    {
        return response()->json(Teacher::with('course')->get());
    }

    public function fetchSemester ($rombel_id, $student_id, $semester) {
        //code...
        $nilai = \DB::table('semesters')
            ->where('rombel_id', '=', $rombel_id)
            ->where('student_id', '=', $student_id)
            ->where('semester', '=', $semester)
            ->get();

        return response()->json($nilai);
    }


    public function editKehadiran($rombel_id, $student_id, $semester)
    {
        $kehadiran = \DB::table('semesters')
            ->where('rombel_id', '=', $rombel_id)
            ->where('student_id', '=', $student_id)
            ->where('semester', '=', $semester)
            ->first();

        return response()->json($kehadiran);
    }

    public function updateKehadiran ($id, Request $request) {
        //code...
        \DB::table('semesters')->where('id',$id)->update(
            $request->except(['id'])
        );
        $kehadiran = \DB::table('semesters')->find($id);
        return response()->json($kehadiran);
    }

    public function entryNilai ($section_id, $student_id) {
        //code...
        $rapor = Rapor::with('student', 'section')
            ->where('student_id', $student_id)
            ->section($section_id)
            ->where('semester', \Config::get('kalender.semester'))
            ->first();

        return response()->json($rapor);
    }

    public function updateRapor ($id, Request $request) {
        
        $score_knowledge = round(((($request->get('NH') + $request->get('UTS') + $request->get('UAS')) / 3) / 100) * 4, 2);
        $score_skill = round(((($request->get('NPr') + $request->get('NPj') + $request->get('NPo')) / 3) / 100) * 4, 2);
        $score_attitude = round(((($request->get('NO') + $request->get('NDs') + $request->get('NAt') + $request->get('NJ')) / 4) / 100) * 4, 2);

        Rapor::find($id)->update([
            'score_knowledge'  => $score_knowledge,
            'NH'               => $request->get('NH'),
            'UTS'              => $request->get('UTS'),
            'UAS'              => $request->get('UAS'),
            'letter_knowledge' => $this->huruf($score_knowledge),
            'desc_knowledge'   => $request->get('desc_knowledge'),

            'score_skill'      => $score_skill,
            'NPr'              => $request->get('NPr'),
            'NPj'              => $request->get('NPj'),
            'NPo'              => $request->get('NPo'),
            'letter_skill'     => $this->huruf($score_skill),
            'desc_skill'       => $request->get('desc_skill'),

            'score_attitude'   => $score_attitude,
            'NO'               => $request->get('NO'),
            'NDs'              => $request->get('NDs'),
            'NAt'              => $request->get('NAt'),
            'NJ'               => $request->get('NJ'),
            'letter_attitude'  => $this->sikap($score_attitude),
            'desc_attitude'    => $request->get('desc_attitude'),

        ]);
        $rapor = Rapor::with('student', 'section')->find($id);

        return response()->json($rapor);
    }


    private function huruf($score)
    {
        if ($score > 3.66)
        {
            return 'A';
        } elseif ($score > 3.33 && $score < 3.67)
        {
            return 'A-';
        } elseif ($score > 3 && $score < 3.34)
        {
            return 'B+';
        } elseif ($score > 2.66 && $score < 3.01)
        {
            return 'B';
        } elseif ($score > 2.33 && $score < 2.67)
        {
            return 'B-';
        } elseif ($score > 2 && $score < 2.34)
        {
            return 'C+';
        } elseif ($score > 1.66 && $score < 2.01)
        {
            return 'C';
        } elseif ($score > 1.33 && $score < 1.67)
        {
            return 'C-';
        } elseif ($score > 1 && $score < 1.34)
        {
            return 'D+';
        }

        return 'D';
    }

    private function sikap($score){
        if ($score > 3.5)
        {
            return 'SB';
        } elseif ($score > 2.51 && $score < 3.49)
        {
            return 'B';
        } elseif ($score > 1.51 && $score < 2.50)
        {
            return 'C';
        } elseif ($score > 1.01 && $score < 1.50)
        {
            return 'K';
        } 

        return '-';
    }

    public function historis ($student_id) {
        $rapor = Rapor::with('section', 'student')
                    ->where('student_id', $student_id)
                    ->get();
        return response()->json($rapor);
    }

    public function year ($student_id) {
        //code...
        return \DB::table('rapors')->where('student_id', '=', $student_id)->select('year', 'rombel_id')->distinct()->get();
    }

    public function editKalender () {
        $kalender =  \DB::table('kalenders')->first();

        return response()->json($kalender);
    }

    public function updateKalender (Request $request) {
        \DB::table('kalenders')->where('id', 1)
            ->update([
                'year' => $request->get('year'),
                'semester' => $request->get('semester'),
                'expire' => $request->get('expire'),
                'open' => $request->get('open'),
            ]);
        $kalender = \DB::table('kalenders')->first();
        return response()->json($kalender);
    }

    public function kenaikan(Request $request){
        dd($request->all);
    }

    public function newUser(Request $request){
        // dd($request->all());
        $user = User::create([
            'username'  => $request->input('nis'),
            'role'      => 5,
            'password'  => bcrypt($request->input('nis')),
            'thumbnail' => '/profiles/default.jpg'

        ]);

        $user->student()->create([
            'name'        => $request->input('name'),
            'nis'         => $request->input('nis'),
            'birth'       => $request->input('birth'),
            'birth_place' => $request->input('birth_place'),
            'gender'      => $request->input('gender'),
            'bp'          => $request->input('bp')
        ]);

        // flash()->success('Berhasil menambahkan peserta didik');

        return response()->json($user);
    }

    public function newKelas(Request $request){
        $kelas = Kelas::find($request->input('kelas'));

        $rombel = Rombel::create([
            'kode'       => $request->input('kode'),
            'name'       => $kelas->tingkat . ' ' . $kelas->jurusan . ' ' . $kelas->no,
            'year'       => \Config::get('kalender.year'),
            'kelas_id'   => $request->input('kelas'),
            'teacher_id' => $request->input('teacher'),
        ]);

        $student_ids = $request->input('student');
        $rombel->student()->attach($student_ids);
        $time = Carbon::now();
        foreach ($student_ids as $id) {
            # code...
            \DB::table('semesters')->insertGetId([
                'rombel_id' => $rombel->id,
                'student_id' => $id,
                'semester' => 1,
                'year' => \Config::get('kalender.year'),
                'created_at' => $time,
                'updated_at' => $time,
            ]);

            \DB::table('semesters')->insertGetId([
                'rombel_id' => $rombel->id,
                'student_id' => $id,
                'semester' => 2,
                'year' => \Config::get('kalender.year'),
                'created_at' => $time,
                'updated_at' => $time,
            ]);
        }

        return response()->json($rombel);
    }

    public function newSeksi(){
        // $teacher_id = $request->get('teacher_id');
        // $course_id = $request->get('course_id');
        //     foreach (range(0, 11) as $index) {                 

        //         $this->createRapor($request, Section::create([
        //                 'kode'       => $request->get('kode').'-'.$index,
        //                 'rombel_id'  => $request->get('rombel_id'),
        //                 'course_id'  => $course_id[$index],
        //                 'teacher_id' => $teacher_id[$index],
        //                 'year'       => $request->get('year'),
        //         ]), $course_id[$index]);
        //     }    
        return response()->json('success');
    }

    private function createRapor(Request $request, $section, $course_id)
    {
        foreach (Rombel::find($request->input('rombel_id'))->student->lists('id') as $id)
        {
            Rapor::create([
                'student_id' => $id,
                'section_id' => $section->id,
                'rombel_id'  => $request->get('rombel_id'),
                'course_id'  => $course_id,
                'year'       => $request->input('year'),
                'semester'   => 1,
            ]);

            Rapor::create([
                'student_id' => $id,
                'section_id' => $section->id,
                'rombel_id'  => $request->get('rombel_id'),
                'course_id'  => $course_id,
                'year'       => $request->input('year'),
                'semester'   => 2,
            ]);
        }
    }
}
