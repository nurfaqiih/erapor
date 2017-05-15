<?php namespace App\Http\Excel;

use App\Teacher;
use Maatwebsite\Excel\Files\ExportHandler;

/**
* 
*/
class TeacherExportHandler implements ExportHandler
{
    public function handle($export)
    {
        $results = Teacher::all();

        return $export->sheet('Data Pendidik', function ($sheet) use ($results) {
            $sheet->setStyle(array(
                    'font' => array(
                    'name'      =>  'Times New Roman',
                    'size'      =>  12
            )));
            // Header
            $sheet->mergeCells('A1:J1');
            $sheet->cell('A1', function ($cell) {
                $cell->setAlignment('center');
                $cell->setFont([
                    'bold' => true,
                    'size' => 15
                ]);
            });
            $sheet->row(1, ['Tabel Data Pendidik']);

            $sheet->mergeCells('A2:J2');
            $sheet->cell('A2', function ($cell) {
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
            $sheet->setBorder('A6:J'.$count, 'thin');
            $sheet->cells('A6:J6', function ($cell) {
                $cell->setFont([
                    'bold' => true
                ]);
            });
        })->export('xls');
    }
}
