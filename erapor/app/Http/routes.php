<?php

use App\User;
use App\Kelas;
use App\Course;
use App\Rombel;
use App\Student;
use App\Teacher;
use Illuminate\Http\Request;

Route::get('menu_tamu', function(){
    return User::all();                                                                                       
});

Route::get('/', [
    'uses' => 'WelcomeController@index',
    'as'   => 'home'
]);

Route::group(['prefix' => 'api'], function () {
    get('section', 'ApiController@section');
    get('section-create/fetchCourse', 'ApiController@sectionFetchCourse');
    get('section-create/fetchRombel', 'ApiController@sectionFetchRombel');
    get('rombel', 'ApiController@createRombel');
    get('user/teacher', 'ApiController@teacher');
    get('walikelas', 'ApiController@walikelas');
    get('fetchTeachers', 'ApiController@fetchTeachers');
    get('lihat-rapor/{rombel_id}/{student_id}/{semester}', [
        'uses' => 'ApiController@rapors',
    ]);
    get('fetchRombel/{rombel_id}/{student_id}/{semester}', [
        'uses' => 'ApiController@fetchRombel',
    ]);
    get('fetchStudent/{student_id}', 'ApiController@fetchStudent');
    get('fetchSemester/{rombe_id}/{student_id}/{semester}', 'ApiController@fetchSemester');
    get('leger/{rombel_id}/{semester}', 'ApiController@fetchLeger');

    get('entry-nilai/{section_id}/{student_id}', [
        'uses' => 'ApiController@entryNilai',
    ]);
    post('entry-nilai/{rapor_id}', 'ApiController@updateRapor');

    get('kehadiran/{rombel_id}/{student_id}/{semester}', 'ApiController@editKehadiran');
    post('kehadiran/{id}', 'ApiController@updateKehadiran');

    get('historis/{student_id}', 'ApiController@historis');
    get('historis/year/{student_id}', 'ApiController@year');

    get('kalender/edit', 'ApiController@editKalender');
    post('kalender/update', 'ApiController@updateKalender');

    post('kenaikan', 'ApiController@kenaikan');

    post('new/student', ['as' => 'new_student', 'uses' => 'ApiController@newUser']);

    post('new/kelas', ['as' => 'new_kelas', 'uses' => 'ApiController@newKelas']);

    post('new/seksi', ['as' => 'new_seksi', 'uses' => 'ApiController@newSeksi']);
}); 

Route::group(['middleware' => ['auth']], function(){
    get('cetak/leger/{rombel}/{semeseter}', function($rombel_id, $semester){
        $rombel_id = $rombel_id;
        $semester = $semester;
        return view('partials.rapor.cetak-leger', compact('rombel_id', 'semester'));
    });
    get('cetak/rapor/{rombel_id}/{student_id}/{semester}', function($rombel_id, $student_id, $semester){
        $rombel = $rombel_id;
        $student = $student_id;
        $semesters = $semester;
        return view('partials.rapor.cetak-rapor', compact('rombel', 'student', 'semesters'));
    });
});

//Route Untuk Administrator
Route::group(['middleware' => ['auth', 'admin']], function () {
    resource('admin', 'AdminController');
    get('master/user', [
        'uses' => 'AdminController@user',
        'as'   => 'admin.user'
    ]);
    get('dashboard/admin', [
        'uses' => 'AdminController@dashboard',
        'as'   => 'admin.dashboard'
    ]);
    post('delete', 'AdminController@delete');
});


//Route untuk operator
Route::group(['middleware' => ['auth', 'op']], function () {
    resource('operator', 'OperatorController');
    get('operator/setting/kalender-akademik', [
        'as' => 'operator.kalender',
        'uses' => 'OperatorController@kalender'
    ]);
    resource('section', 'SectionController');
    resource('lokal', 'KelasController');
    resource('students', 'StudentsController');
    resource('teachers', 'TeachersController');
    resource('course', 'CoursesController');
    resource('kelas', 'RombelController');
    post('section-delete', 'OperatorController@section');
    post('students-delete', 'OperatorController@student');
    post('teacher-delete', 'OperatorController@teacher');
    post('course-delete', 'OperatorController@course');
    post('rombel-delete', 'OperatorController@rombel'); 
    post('kelas-delete', 'OperatorController@kelas');

    get('operator/setting/semester/tahunajar/baru', ['as' => 'new_semester', function(){
        $kelas = Kelas::orderBy('name')->lists('name', 'id');
        $student = Student::lists('name', 'id');
        $teacher = Teacher::doesntHave('rombel')->orderBy('name')->lists('name', 'id');
        $rombel = Rombel::doesnthave('section')->where('year', Config::get('kalender.year'))->lists('name', 'id');
        $course = Course::lists('name', 'id');
        $kode = \Carbon\Carbon::now()->year . '-' . rand(100, 999);

        return view('user.operator.new_semester', compact('kelas', 'student', 'teacher', 'rombel', 'course', 'teacher', 'kode'));
    }]);
});


//Route Untuk Kepala Sekolah
Route::group(['middleware' => ['auth', 'kepala'], 'prefix' => 'kepala'], function () {
    get('sekolah', [
        'as'   => 'kepala.index',
        'uses' => 'KepalaController@index'
    ]);
    get('data-guru', [
        'as'   => 'kepala.teacher',
        'uses' => 'KepalaController@teacher'
    ]);
    get('data-peserta-didik', [
        'as'   => 'kepala.student',
        'uses' => 'KepalaController@student'
    ]);
    get('data-kelas', [
        'as'   => 'kepala.kelas',
        'uses' => 'KepalaController@kelas',
    ]);
    get('data-mata-pelajaran', [
        'as'   => 'kepala.course',
        'uses' => 'KepalaController@course'
    ]);
    get('rapor', [
        'as'   => 'kepala.rapor',
        'uses' => 'KepalaController@rapor'
    ]);
    get('rapor/year', 'KepalaController@year');
    get('rapor/rombel', 'KepalaController@rombel');
    get('rapor/result/{id}', 'KepalaController@result');
});

//Route Untuk Guru / Pendidik
Route::group(['middleware' => ['auth','teacher']], function () {
    resource('teacher', 'TeacherController', [
        'only' => ['index']
    ]);
    get('kelas-yang-diajar', [
        'as'   => 'teacher.akademik',
        'uses' => 'TeacherController@akademik'
    ]);
    get('kelas-yang-diajar/seksi/{section}', [
        'as'   => 'teacher.section',
        'uses' => 'TeacherController@section',
        
    ]);
    get('teacher/walikelas', [
        'as'   => 'teacher.walas',
        'uses' => 'TeacherController@walas'
    ]);
    get('teacher/walikelas/kenaikan-kelas', [
        'as'   =>  'teacher.edit.kenaikan',
        'uses' =>  'TeacherController@editKenaikan'
    ]);
    post('teacher/walikelas/kenaikan-kelas', [
        'as'  => 'teacher.update.kenaikan',
        'uses' => 'TeacherController@updateKenaikan'
    ]);
    get('akademik/student/{student}/{section}', [
        'as'   => 'teacher.rapor',
        'uses' => 'TeacherController@rapor'
    ]);
});

//Route Untuk Peserta Didik
Route::group(['middleware' => ['auth', 'student']], function () {
    resource('student', 'StudentController', ['only' => 'index']);
    get('student/course', [
        'as'   => 'student.course',
        'uses' => 'StudentController@course'
    ]);
    get('student/rapor', [
        'as'         => 'student.rapor',
        'uses'       => 'StudentController@rapor',
        'middleware' => 'available'
    ]);
    get('student/historis', [
        'as'   => 'student.historis',
        'uses' => 'StudentController@historis'
    ]);
    get('print/rapor', [
        'as'   => 'print.rapor',
        'uses' => 'StudentController@printRapor'
    ]);
});


Route::controller('auth', 'Auth\AuthController', ['getLogin' => 'auth.login', 'getLogout' => 'auth.logout']);
Route::controller('password', 'Auth\PasswordController');

Route::group(['middleware' => ['auth', 'valid']], function () {
    resource('validation', 'GlobalController', [
        'only' => 'update'
    ]);

    get('account/validation', [
        'uses' => 'GlobalController@validation',
        'as'   => 'validation'
    ]);
});

Route::group(['middleware' => ['auth']], function () {
    get('account/profiles/{id}', [
        'uses' => 'GlobalController@profiles',
        'as'   => 'account.profiles'
    ]);

    get('account/setting/{id}', [
        'uses' => 'GlobalController@settings',
        'as'   => 'account.setting'
    ]);

    post('account/setting/{id}', [
        'uses' => 'GlobalController@settingsUpdate',
        'as'   => 'setting.update'
    ]);
});

Route::group(['prefix' => 'errors'], function(){
    get('access-forbidden', [
        'as' => 'forbidden', function () {
            return view('errors.403');
        }
    ]);

    get('expire', [
        'as' => 'expire',
        function(){
            return view('errors.expire');
        }
    ]);

    get('coming-soon', [
        'as' => 'available',
        function (){
            return view('errors.available');
        }
    ]);

    get('request_page_not_found', [
        'as' => '404',
        function(){
            return view('errors.404');
        }
    ]);
});

Route::group(['prefix' => 'excel', 'middleware' => ['auth']], function(){
    get('/export/user', ['uses' => 'ExcelController@exportUser', 'as' => 'export.user']);
    post('/import/user', ['uses' => 'ExcelController@importUser', 'as' => 'import.user']);

    get('export/section', ['uses' => 'ExcelController@exportSection', 'as' => 'export.section']);
    post('import/section', ['uses' => 'ExcelController@importSection', 'as' => 'import.section']);

    get('export/kelas', ['uses' => 'ExcelController@exportKelas', 'as' => 'export.kelas']);
    post('import/kelas', ['uses' => 'ExcelController@importKelas', 'as' => 'import.kelas']);    

    get('export/course', ['uses' => 'ExcelController@exportCourse', 'as' => 'export.course']);
    post('import/course', ['uses' => 'ExcelController@importCourse', 'as' => 'import.course']);

    get('export/student', ['uses' => 'ExcelController@exportStudent', 'as' => 'export.student']);
    post('import/student', ['uses' => 'ExcelController@importStudent', 'as' => 'import.student']);

    get('export/teacher', ['uses' => 'ExcelController@exportTeacher', 'as' => 'export.teacher']);
    post('import/teacher', ['uses' => 'ExcelController@importTeacher', 'as' => 'import.teacher']);

    get('export/rombel', ['uses' => 'ExcelController@exportRombel', 'as' => 'export.rombel']);
    post('import/rombel', ['uses' => 'ExcelController@importRombel', 'as' => 'import.rombel']);    

    get('/export/blangko/{rombel_id}/{course_id}', ['uses' => 'ExcelController@exportBlangko', 'as' => 'export.blangko']);
    post('/import/blangko', ['uses' => 'ExcelController@importBlangko', 'as' => 'import.blangko']);

    get('/export/kehadiran', ['as' => 'export.kehadiran', 'uses' => 'ExcelController@exportKehadiran']);
    post('/import/kehadiran', ['as' => 'import.kehadiran', 'uses' => 'ExcelController@importKehadiran']);
});