<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Rapor extends Model {

    /**
     * @var array
     */
    protected $fillable = [
        'desc',
        'student_id',
        'section_id',
        'rombel_id',
        'course_id',
        'year',
        'semester',

        'score_knowledge',
        'letter_knowledge',
        'desc_knowledge',
        'NH',
        'UTS',
        'UAS',

        'score_skill',
        'letter_skill',
        'desc_skill',
        'NPr',
        'NPj',
        'NPo',

        'score_attitude',
        'letter_attitude',
        'desc_attitude',
        'NO',
        'NDs',
        'NAt',
        'NJ',
    ];

    /**
     * @param $query
     * @param $id
     *
     * @return mixed
     */
    public function scopeStudent($query, $id)
    {
        return $query->where('student_id', $id);
    }

    /**
     * @param $query
     * @param $id
     *
     * @return mixed
     */
    public function scopeSection($query, $id)
    {
        return $query->where('section_id', $id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function section()
    {
        return $this->belongsTo('App\Section');
    }

}
