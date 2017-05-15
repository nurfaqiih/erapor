<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Section
 *
 * @package App
 * @property-read \App\Teacher $teacher 
 * @property-read mixed $teachers 
 * @property-read \App\Rombel $rombel 
 * @property-read mixed $rombels 
 * @property-read mixed $kelas 
 * @property-read mixed $student 
 * @property-read mixed $course 
 */
class Section extends Model {

    use RecordsActivity;

    /**
     * @var array
     */
    protected $fillable = [
        'kode',
        'rombel_id',
        'course_id',
        'teacher_id',
        'year',
        'semester',
        'status'
    ];

    /**
     * @var string
     */
    protected $table = 'sections';

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }

    public function getTeachersAttribute()
    {
      return $this->teacher->id;
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rombel()
    {
        return $this->belongsTo('App\Rombel');
    }

    public function getRombelsAttribute()
    {
        return $this->rombel->id;
    }

    /**
     * Get the kelas that have this section
     *
     * @return mixed
     */
    public function getKelasAttribute()
    {
        return $this->rombel->kelas;
    }

    /**
     * Get the students that owned this section
     *
     * @return mixed
     */
    public function getStudentAttribute()
    {
        return $this->rombel->student;
    }

    /**
     * Get course that have this sektion
     *
     * @return mixed
     */
    public function getCourseIdAttribute()
    {
        return $this->teacher->course->id;
    }

    public function getCourseAttribute()
    {
        return $this->teacher->course;
    }

    public function course()
    {
        return $this->teacher->course;
    }

    public function rapor()
    {
        return $this->hasMany('App\Rapor');
    }
}
