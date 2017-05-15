<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Rombel
 *
 * @property-read \App\Kelas $kelas 
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Student')->withPivot('year[] $student 
 * @property-read mixed $student_list 
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Section[] $section 
 */
class Rombel extends Model {

    use RecordsActivity;

    /**
     * @var array
     */
    protected $fillable = ['name', 'year', 'kelas_id', 'kode', 'teacher_id'];

    /**
     * @var string
     */
    protected $table = 'rombels';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function student()
    {
        return $this->belongsToMany('App\Student');
    }

    public function getStudentListAttribute()
    {
        return $this->student->lists('id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function section()
    {
        return $this->hasMany('App\Section');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }

}
