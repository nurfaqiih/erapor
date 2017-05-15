<?php namespace App\Http\Excel;

use App\Rombel;
use Maatwebsite\Excel\Files\NewExcelFile;

/**
* 
*/
class KehadiranExport extends NewExcelFile
{
	public function getFilename()
	{
		$teacher = \Auth::user()->teacher;
    	$rombel = Rombel::where('teacher_id', $teacher->id)->where('year', \Config::get('kalender.year'))->first();

		return 'Blangko Kehadiran-'.$rombel->name;
	}
}