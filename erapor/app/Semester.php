<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model {

	protected $table ='semesters';

	protected $fillable = ['rombel_id', 'student_id', 'semester', 'year', 'alfa', 'izin', 'sakit', 'pramuka', 'uks', 'desc'];

	public function student()
	{
		return $this->belongsTo('App\Student');
	}

}
