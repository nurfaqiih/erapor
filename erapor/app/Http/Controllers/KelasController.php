<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\KelasRequest;
use App\Kelas;
use DB;
use Illuminate\Http\Request;

class KelasController extends Controller {

    private $kelas;

    public function __construct(Kelas $kelas)
    {
        $this->kelas = $kelas->with('rombel')->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $kelas = $this->kelas;

        return view('user.operator.kelas.index', compact('kelas'));
    }

    public function tingkat($tingkat)
    {
        $kelas = $this->kelas->where('tingkat', $tingkat);

        return view('user.operator.kelas.tingkat', compact('kelas', 'tingkat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $kelas = $this->kelas;

        return view('user.operator.kelas.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(KelasRequest $request, Kelas $kelas)
    {
        $check = $this->kelasCheck($request);

        if ($check == true)
        {
            flash()->error('Kelas Already exist!')->important();

            return redirect()->back();
        }
        $kelas->create($request->all());

        flash()->success('Berhasil menambahkan Kelas');

        return redirect()->route('lokal.index');
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
        $kelas = $this->kelas->find($id);

        return view('user.operator.kelas.show', compact('kelas'));
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
        $kelas = $this->kelas->find($id);

        return view('user.operator.kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update($id, KelasRequest $request, Kelas $kelas)
    {
        $check = $this->kelasCheck($request);

        if ($check == false)
        {
            $kelas->find($id)->update($request->all());
        } else
        {
            flash()->error('Kelas Already exist')->important();

            return redirect()->back();
        }
        flash()->success('Berhasil mengubah kelas');

        return redirect()->route('lokal.show', $id);
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
        $this->kelas->find($id)->delete();

        return redirect(route('lokal.index'));
    }

    /**
     * @param KelasRequest $request
     *
     * @return bool
     */
    private function kelasCheck(KelasRequest $request)
    {
        $check = DB::table('kelas')->where([
            'tingkat' => $request->input('tingkat'),
            'jurusan' => $request->input('jurusan'),
            'no'      => $request->input('no')
        ])->exists();

        return $check;
    }

}
