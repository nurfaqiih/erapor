<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Kelas
 *
 * @package App
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Rombel[] $rombel 
 */
class Kelas extends Model
{
    use RecordsActivity;

    /**
     * @var array
     */
    protected $fillable = ['name', 'tingkat', 'jurusan', 'no'];

    /**
     * @var string
     */
    protected $table = 'kelas';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rombel()
    {
        return $this->hasMany('App\Rombel');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function section()
    {
        return $this->hasManyThrough('App\Section', 'App\Rombel');
    }
}
