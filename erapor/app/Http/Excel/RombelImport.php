<?php namespace App\Http\Excel;

use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Files\ExcelFile;

/**
* 
*/
class RombelImport extends ExcelFile
{
	
	public function getFile()
    {
        $file = Input::file('excel');
        $name = 'Excel'.$file->getClientOriginalName();
        $filename = $file->move(storage_path('excel/exports/'), $name);

        // Return it's location
        return $filename;
    }

    public function getFilters()
    {
        return [
            'chunk'
        ];
    }
}