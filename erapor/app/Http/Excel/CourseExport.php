<?php namespace App\Http\Excel;

use Carbon\Carbon;
use Maatwebsite\Excel\Files\NewExcelFile;

/**
* 
*/
class CourseExport extends NewExcelFile
{
    public function getFilename()
    {
    	return 'Mata Pelajaran-'.Carbon::now();
    }
}
