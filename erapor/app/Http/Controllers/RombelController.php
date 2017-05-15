<?php namespace App\Http\Controllers;

use App\Kelas;
use App\Rombel;
use App\Section;
use App\Student;
use App\Teacher;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRombelRequest;

class RombelController extends Controller {

    private $year, $semester, $rombel;

    public function __construct(Request $request)
    {
        list($year, $semester) = $this->tahunAjar();

        $this->year = $year;
        $this->semester = $semester;

        $this->rombel = Rombel::with('student', 'section', 'kelas', 'teacher')->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $rombels = $this->rombel;

        return view('user.operator.rombel.index', compact('rombels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $kelas = Kelas::orderBy('name')->lists('name', 'id');
        $student = Student::lists('name', 'id');
        $teacher = Teacher::doesntHave('rombel')->orderBy('name')->lists('name', 'id');

        return view('user.operator.rombel.create', compact('kelas', 'student', 'teacher'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateRombelRequest $request)
    {
        if ($this->checkrombel($request, $this->year) == true)
        {
            flash()->error('Rombongan Belajar sudah terdaftar')->important();

            return redirect()->back();
        }
        $this->createRombel($request);
        flash()->success('Berhasil menambahkan rombongan belajar');

        return redirect()->route('kelas.index');
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
        $rombel = $this->rombel->find($id);

        return view('user.operator.rombel.show', compact('rombel'));
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
        $rombel = $this->rombel->find($id);
        $student = Student::where('bp', $this->checkBp($rombel->kelas->tingkat))->lists('name', 'id');

        return view('user.operator.rombel.edit', compact('rombel', 'student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update($id, Request $request, Rombel $rombel)
    {
        $data = [];
        foreach ($request->input('student_list') as $student_id)
        {
            $data[$student_id] = ['year' => $this->year];
        }
        $rombel->find($id)->student()->sync($data);

        return redirect()->route('kelas.show', $id);
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
        $this->rombel->find($id)->delete();
        \DB::table('rapors')->where('rombel_id', '=', $id)->delete();
        \DB::table('semesters')->where('rombel_id', '=', $id)->delete();

        return redirect()->route('kelas.index');
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
     * @param Request $request
     */
    protected function createRombel(Request $request)
    {
        $kelas = Kelas::find($request->input('kelas'));

        $rombel = Rombel::create([
            'kode'       => $request->input('kode'),
            'name'       => $kelas->tingkat . ' ' . $kelas->jurusan . ' ' . $kelas->no,
            'year'       => $this->year,
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
                'year' => $this->year,
                'created_at' => $time,
                'updated_at' => $time,
            ]);

            \DB::table('semesters')->insertGetId([
                'rombel_id' => $rombel->id,
                'student_id' => $id,
                'semester' => 2,
                'year' => $this->year,
                'created_at' => $time,
                'updated_at' => $time,
            ]);
        }
    }

    /**
     * @param $tingkat
     *
     * @return string
     */
    private function checkBp($tingkat)
    {
        if ($tingkat == 'X')
        {
            return Carbon::now()->format('Y');

        } elseif ($tingkat == 'XI')
        {
            return Carbon::now()->format('Y') - 1;

        } elseif ($tingkat == 'XII')
        {
            return Carbon::now()->format('Y') - 2;
        }

        return $bp;
    }

    /**
     * @param CreateRombelRequest $request
     * @param $year
     *
     * @return bool
     */
    private function checkrombel(CreateRombelRequest $request, $year)
    {
        $check = \DB::table('rombels')
            ->where('kelas_id', '=', $request->input('kelas'))
            ->where('year', '=', $year)
            ->exists();

        return $check;
    }

}
