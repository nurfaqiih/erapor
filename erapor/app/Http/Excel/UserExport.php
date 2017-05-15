<?php namespace App\Http\Excel;

use Carbon\Carbon;
use Maatwebsite\Excel\Files\NewExcelFile;

/**
* 
*/
class UserExport extends NewExcelFile
{
	
	public function getFilename()
	{
		return 'Master Data User - '.Carbon::now();
	}
}