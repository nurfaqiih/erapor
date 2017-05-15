<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 *
 * @package App
 * @property-read \App\User $user 
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Rombel')->withPivot('year[] $rombel 
 */
class Student extends Model {

    use RecordsActivity;

    /**
     * The database table used by model.
     *
     * @var string
     */
    protected $table = 'students';

    /**
     * The attributes that mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'nis', 'birth', 'birth_place', 'gender', 'bp', 'user_id',
        'kelas', 'agama', 'anak_ke', 'address', 'telp', 'sekolah_asal',
        'ayah', 'ibu', 'address_ortu', 'telp_ortu', 'job_ayah', 'job_ibu',
        'wali', 'address_wali', 'telp_wali', 'job_wali'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
     public function user()
    {
        return $this->belongsTo('App\User');
	}


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function rombel()
    {
        return $this->belongsToMany('App\Rombel');
    }

    public function rapor()
    {
        return $this->hasMany('App\Rapor');
    }
}
