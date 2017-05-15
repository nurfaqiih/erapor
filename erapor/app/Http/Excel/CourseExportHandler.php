<?php namespace App\Http\Excel;

use App\Course;
use Maatwebsite\Excel\Files\ExportHandler;

/**
* 
*/
class CourseExportHandler implements ExportHandler
{
    public function handle($export)
    {
    	$results = Course::all();

    	return $export->sheet('Data Mata Pelajaran', function($sheet) use($results){
    		$sheet->setStyle(array(
                    'font' => array(
					'name'      =>  'Times New Roman',
					'size'      =>  12
			)));
			// Header
			$sheet->mergeCells('A1:F1');
			$sheet->cell('A1', function($cell){
				$cell->setAlignment('center');
				$cell->setFont([
					'bold' => true,
					'size' => 15
				]);
            });
			$sheet->row(1, ['Tabel Data Mata Pelajaran']);

			$sheet->mergeCells('A2:F2');
			$sheet->cell('A2', function($cell){
				$cell->setAlignment('center');
				$cell->setFont([
					'bold' => true,
					'size' => 15
				]);
			});
			$sheet->row(2, ['Aplikasi E-Rapor SMAN 7 Padang']);

			$sheet->setFreeze('A7');
			$sheet->fromModel($results, null, 'A6', true);
			$count = $results->count() + 6;
			$sheet->setAutoSize(true);
			$sheet->setBorder('A6:F'.$count, 'thin');
            $sheet->cells('A6:F6', function($cell){
				$cell->setFont([
					'bold' => true
				]);
            });
    	})->export('xls');
    }
}
