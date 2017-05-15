<?php namespace App\Http\Excel;

use Carbon\Carbon;
use Maatwebsite\Excel\Files\NewExcelFile;

/**
* 
*/
class RombelExport extends NewExcelFile
{
    public function getFilename()
    {
        return 'Rombongan Belajar-'.Carbon::now();
    }
}
