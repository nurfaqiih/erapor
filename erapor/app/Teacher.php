<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Teacher
 *
 * @package App
 * @property-read \App\User $user 
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Section[] $section 
 * @property-read \App\Course $course 
 */
class Teacher extends Model {

    use RecordsActivity;

    /**
     * The database table used by model
     *
     * @var string
     */
    protected $table = 'teachers';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['name', 'nip', 'birth', 'birth_place', 'user_id', 'course_id', 'gender'];

    protected $cast = [
        'nip' => 'integer'
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function section()
    {
        return $this->hasMany('App\Section');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function rombel()
    {
        return $this->hasOne('App\Rombel');
    }

}
