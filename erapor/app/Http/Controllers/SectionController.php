<?php namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateSectionRequest;
use App\Kelas;
use App\Rapor;
use App\Rombel;
use App\Section;
use App\Student;
use App\Teacher;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SectionController extends Controller {

    /**
     * @var \Illuminate\Database\Eloquent\Collection|mixed|static[]
     */
    protected $section, $year, $semester;

    /**
     * @param Section $section
     * @param Request $request
     */
    public function __construct(Section $section, Request $request)
    {

        list($year, $semester) = $this->tahunAjar();
        $this->year = $year;
        $this->semester = $semester;
        $this->section = $section->with(['teacher', 'rombel'])->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sections = $this->section;

        return view('user.operator.section.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $rombel = Rombel::doesnthave('section')->where('year', $this->year)->lists('name', 'id');
        $course = Course::lists('name', 'id');
        $kode = \Carbon\Carbon::now()->year . '-' . rand(100, 999);

        return view('user.operator.section.create', compact('rombel', 'course', 'kode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $teacher_id = $request->get('teacher_id');
        $course_id = $request->get('course_id');
            foreach (range(0, 11) as $index) {
                if ($this->sectionCheck($request, $course_id[$index]) == true)
                {
                    flash()->error('Mata Pelajaran untuk rombel ini sudah ada!')->important();

                    return redirect()->route('section.create');
                }   

                $this->createRapor($request, Section::create([
                        'kode'       => $request->get('kode').'-'.$index,
                        'rombel_id'  => $request->get('rombel_id'),
                        'course_id'  => $course_id[$index],
                        'teacher_id' => $teacher_id[$index],
                        'year'       => $request->get('year'),
                ]), $course_id[$index]);
            }    
        
        flash()->success('New Section has been created');

        return redirect()->route('section.index');
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
        $section = $this->section->find($id);

        return view('user.operator.section.show', compact('section'));
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
        $section = $this->section->find($id);
        $teacher = Teacher::lists('name', 'id');
        $rombel = Rombel::lists('name', 'id');
        $course = Course::lists('name', 'id');

        return view('user.operator.section.edit', compact('section', 'rombel', 'course', 'teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update($id, CreateSectionRequest $request, Section $section)
    {
        if ($this->sectionCheck($request) == true)
        {
            flash()->error('Mata Pelajaran untuk Rombel ini sudah ada!')->important();

            return redirect()->route('section.create');
        }

        $section->find($id)->update([
            'rombel_id'  => $request->input('rombel_id'),
            'teacher_id' => $request->input('teacher_id')
        ]);
        flash()->success('Section has been updated :)');

        return redirect()->route('section.show', $id);
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
        Section::destroy($id);
        flash()->success('Berhasil menghapus Seksi');

        return redirect(route('section.index'));
    }


    /**
     * @return array
     */
    protected function tahunAjar()
    {
        if (Carbon::now()->month > 6)
        {

            return [Carbon::now()->year . '/' . (Carbon::now()->year + 1), 1];
        }

        return [(Carbon::now()->year - 1) . '/' . Carbon::now()->year, 2];
    }

    /**
     * @param CreateSectionRequest $request
     *
     * @return bool
     */
    private function sectionCheck(Request $request, $course_id)
    {
        return \DB::table('sections')->where([
            'rombel_id'  => $request->input('rombel_id'),
            'course_id'  => $course_id
        ])->exists();
    }

    /**
     * @param CreateSectionRequest $request
     * @param $section
     */
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
