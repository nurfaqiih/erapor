<?php namespace App\Http\Excel;

use App\Rapor;
use Maatwebsite\Excel\Files\ExportHandler;

/**
* 
*/
class LeggerExportHandler implements ExportHandler
{
	public function handle($export){
		
		return $export->sheet('', function($sheet){
			$sheet->fromArray(Rapor::all()->where('rombel_id', 1)->where('semester', 1)->toArray());
		})->export('xls');
	}
}