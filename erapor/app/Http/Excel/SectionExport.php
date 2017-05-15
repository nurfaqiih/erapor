<?php namespace App\Http\Excel;

use Carbon\Carbon;
use Maatwebsite\Excel\Files\NewExcelFile;

/**
* 
*/
class SectionExport extends NewExcelFile
{
    public function getFilename()
    {
    	return 'Seksi-'.Carbon::now();
    }
}
