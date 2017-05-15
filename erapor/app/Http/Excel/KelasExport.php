<?php namespace App\Http\Excel;

use Carbon\Carbon;
use Maatwebsite\Excel\Files\NewExcelFile;

/**
* 
*/
class KelasExport extends NewExcelFile
{
    public function getFilename()
    {
        return 'Kelas-'.Carbon::now();
    }
}
