<?php namespace App\Http\Excel;

use App\Rombel;
use App\Section;
use Carbon\Carbon;
use Maatwebsite\Excel\Files\NewExcelFile;

/**
* 
*/
class BlangkoExport extends NewExcelFile
{
	
	public function getFilename()
	{
		$teacher = \Auth::user()->teacher;
		$section = Section::where('teacher_id', $teacher->id)->where('year', \Config::get('kalender.year'))->first();
		$rombel = Rombel::find($section->rombel_id);
		
    	
		return 'Blangko Nilai-'.$rombel->name;
	}
}