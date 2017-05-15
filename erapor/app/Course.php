<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Course
 *
 * @package App
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Teacher[] $teacher 
 * @property-read mixed $teacher_list 
 */
class Course extends Model {

    use RecordsActivity;

    /**
     * The database table used by model.
     *
     * @var string
     */
    protected $table = 'courses';

    /**
     * @var array
     */
    protected $fillable = ['name', 'kode', 'type'];
    /**
     *
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function teacher()
    {
        return $this->hasMany('App\Teacher');
    }

    public function getTeacherListAttribute()
    {
        return $this->teacher->lists('id');
    }
}
