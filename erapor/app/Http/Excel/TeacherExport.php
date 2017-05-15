<?php namespace App\Http\Excel;

use Carbon\Carbon;
use Maatwebsite\Excel\Files\NewExcelFile;

/**
* 
*/
class TeacherExport extends NewExcelFile
{
    public function getFilename()
    {
        return 'Pendidik-'.Carbon::now();
    }
}
