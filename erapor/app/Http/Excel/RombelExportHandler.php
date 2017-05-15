<?php namespace App\Http\Excel;

use App\Rombel;
use Maatwebsite\Excel\Files\ExportHandler;

/**
* 
*/
class RombelExportHandler implements ExportHandler
{
    public function handle($export)
    {
        $results = Rombel::all();

        return $export->sheet('Data Rombongan Belajar', function ($sheet) use ($results) {
            $sheet->setStyle(array(
                    'font' => array(
                    'name'      =>  'Times New Roman',
                    'size'      =>  12
            )));
            // Header
            $sheet->mergeCells('A1:H1');
            $sheet->cell('A1', function ($cell) {
                $cell->setAlignment('center');
                $cell->setFont([
                    'bold' => true,
                    'size' => 15
                ]);
            });
            $sheet->row(1, ['Tabel Data Rombongan Belajar']);

            $sheet->mergeCells('A2:H2');
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
            $sheet->setBorder('A6:H'.$count, 'thin');
            $sheet->cells('A6:H6', function ($cell) {
                $cell->setFont([
                    'bold' => true
                ]);
            });
        })->export('xls');
    }
}
