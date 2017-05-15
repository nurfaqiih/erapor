<?php namespace App\Http\Controllers;

use App\User;
use App\Kelas;
use App\Course;
use App\Rombel;
use App\Section;
use App\Student;
use App\Teacher;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('user.operator.index', compact('sections'));
    }

    /**
    * Menghapus lebih dari satu data seksi
    *
    * @return
    */
    public function section()
    {
        //code...
        Section::destroy(\Input::get('checked'));
        flash()->success('Berhasil Menghapus Seksi');

        return redirect(route('section.index'));
    }

    /**
    * Menghapus lebih dari satu data guru / pendidik
    * 
    * @return
    */
    public function teacher()
    {
        //code...
        Teacher::destroy(\Input::get('checked'));
        flash()->success('Berhasil menghapus pendidik');

        return redirect(route('teachers.index'));
    }

    /**
    * Menghapus lebih dari satu data peserta didik
    * 
    * @return
    */
    public function student()
    {
        //code...
        Student::destroy(\Input::get('checked'));
        flash()->success('Berhasil menghapus peserta didik');

        return redirect(route('students.index'));
    }

    /**
    * Menghapus lebih dari satu data mata pelajaran
    * 
    * @return
    */
    public function course()
    {
        //code...
        Course::destroy(\Input::get('checked'));
        flash()->success('Berhasil menghapus Mata Pelajaran');

        return redirect(route('course.index'));
    }

    /**
    * Menghapus lebih dari satu data rombongan belajar
    * 
    * @return
    */
    public function rombel()
    {
        //code...
        $id = \Input::get('checked');
        Rombel::destroy($id);
        \DB::table('rapors')->where('rombel_id', '=', $id)->delete();
        \DB::table('semesters')->where('rombel_id', '=', $id)->delete();
        flash()->success('Berhasil menghapus Rombongan Belajar');

        return redirect(route('kelas.index'));
    }

    /**
    * Menghapus lebih dari satu data kelas
    * 
    * @return
    */
    public function kelas () {
        //code...
        Kelas::destroy(\Input::get('checked'));
        flash()->success('Berhasil menghapus data kelas');

        return redirect(route('lokal.index'));
    }

    /**
    * 
    * 
    * @return
    */
    public function kalender () {
        $kalender = \DB::table('kalenders')->first();

        return view('user.operator.kalender', compact('kalender'));
    }   
}
