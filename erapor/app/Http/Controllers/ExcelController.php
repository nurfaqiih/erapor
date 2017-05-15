<?php namespace App\Http\Controllers;

use App\User;
use App\Rapor;
use App\Rombel;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Excel\UserExport;
use App\Http\Excel\UserImport;
use App\Http\Excel\KelasExport;
use App\Http\Excel\KelasImport;
use App\Http\Excel\CourseExport;
use App\Http\Excel\CourseImport;
use App\Http\Excel\LeggerExport;
use App\Http\Excel\RombelExport;
use App\Http\Excel\RombelImport;
use App\Http\Excel\BlangkoExport;
use App\Http\Excel\BlangkoImport;
use App\Http\Excel\SectionExport;
use App\Http\Excel\SectionImport;
use App\Http\Excel\StudentExport;
use App\Http\Excel\StudentImport;
use App\Http\Excel\TeacherExport;
use App\Http\Excel\TeacherImport;
use App\Http\Excel\KehadiranExport;
use App\Http\Excel\KehadiranImport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ExcelController extends Controller
{
    public function exportUser(UserExport $export)
    {
        return $export->handleExport();
    }

    public function importUser(UserImport $import)
    {
        $import->handleImport();

        return redirect()->route('admin.user');
    }

    public function exportSection(SectionExport $export)
    {
        return $export->handleExport();
    }

    public function importSection(SectionImport $import)
    {
        $import->handleImport();

        return redirect()->route('section.index');
    }

    public function exportKelas(KelasExport $export)
    {
        $export->handleExport();
    }

    public function importKelas(KelasImport $import)
    {
        $import->handleImport();

        return redirect()->route('kelas.index');
    }

    public function exportCourse(CourseExport $export)
    {
        $export->handleExport();
    }

    public function importCourse(CourseImport $import)
    {
        $import->handleImport();

        return redirect()->route('course.index');
    }

    public function exportStudent(StudentExport $export)
    {
        $export->handleExport();
    }

    public function importStudent(StudentImport $import)
    {
        $import->handleImport();

        return redirect()->route('students.index');
    }

    public function exportTeacher(TeacherExport $export)
    {
        $export->handleExport();
    }

    public function importTeacher(TeacherImport $import)
    {
        $import->handleImport();

        return redirect()->route('teachers.index');
    }

    public function exportRombel(RombelExport $export)
    {
        $export->handleExport();
    }

    public function importRombel(RombelImport $import)
    {
        $import->handleImport();

        return redirect()->route('rombel.index');
    }

    public function exportKehadiran(KehadiranExport $export)
    {
        $export->handleExport();
    }

    public function importKehadiran(KehadiranImport $import)
    {
        $import->handleImport();

        return redirect()->route('teacher.walas');
    }

    public function exportBlangko(BlangkoExport $export)
    {
        $export->handleExport();
    }

    public function importBlangko(BlangkoImport $import)
    {
        $import->handleImport();

        return redirect()->route('teacher.akademik');
    }

    public function exportLegger(LeggerExport $export, $id){
        $export->handleExport($id);
    }
}
