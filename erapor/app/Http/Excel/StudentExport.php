<?php namespace App\Http\Excel;

use Carbon\Carbon;
use Maatwebsite\Excel\Files\NewExcelFile;

/**
* 
*/
class StudentExport extends NewExcelFile
{
    public function getFilename()
    {
    	return 'Peserta Didik-'.Carbon::now();
    }
}
