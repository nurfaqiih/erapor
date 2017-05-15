<?php namespace App\Http\Excel;

use App\Rombel;
use App\Semester;
use App\Http\Excel\KehadiranExport;
use Maatwebsite\Excel\Files\ExportHandler;

/**
* 
*/
class KehadiranExportHandler implements ExportHandler
{
	
	public function handle($export)
	{
		$teacher = \Auth::user()->teacher;
		$rombel = Rombel::where('teacher_id', $teacher->id)->where('year', \Config::get('kalender.year'))->first();
		$semester = Semester::with('student')->where('rombel_id', $rombel->id)->where('semester', \Config::get('kalender.semester'))->get();
		
		foreach ($semester as $row) {
			$data[] =[
				'id'      => $row->id,
				'nis'	  => $row->student->nis,
				'name'    => $row->student->name,
				'alfa'    => $row->alfa,
				'izin'    => $row->izin,
				'sakit'   => $row->sakit,
				'pramuka' => $row->pramuka,
				'uks'     => $row->uks,
				'desc'    => $row->desc
			];
		}

		return $export->sheet($rombel->name, function($sheet) use($data, $teacher, $rombel, $semester)
			{

				$sheet->setStyle(array(
        			'font' => array(
            		'name'      =>  'Times New Roman',
            		'size'      =>  12
        			)
    			));
    			$count = $semester->count() + 6;
    			$sheet->setBorder('A6:I'.$count, 'thin');

				// Header
    			$sheet->mergeCells('A1:I1');
        		$sheet->cell('A1', function($cell){
        			$cell->setAlignment('center');
        		});
        		$sheet->row(1, ['BLANGKO KEHADIRAN PESERTA DIDIK']);
        		$sheet->cell('A2', 'Sekolah');
        		$sheet->mergeCells('A2:B2');
        		$sheet->cell('C2', ': SMA Negeri 7 Padang');
        		$sheet->cell('A3', 'Nama Wali Kelas');
        		$sheet->mergeCells('A3:B3');
        		$sheet->cell('C3', ': '.$teacher->name, function($cells){
        			$cells->setAlignment('left');
        		});
        		$sheet->cell('A4', 'NIP');
        		$sheet->mergeCells('A4:B4');
        		$sheet->cell('C4', ': '.$teacher->nip, function($cells){
        			$cells->setAlignment('left');
        		});
        		$sheet->cell('A5', 'Mata Pelajaran');
        		$sheet->mergeCells('A5:B5');
        		$sheet->cell('C5', ': '.$teacher->course->name, function($cells){
        			$cells->setAlignment('left');
        		});

        		$sheet->cell('G2', 'Kelas', function($cells){
        			$cells->setAlignment('left');
        		});
        		$sheet->mergeCells('G2:H2');
        		$sheet->cell('I2', ': '.$rombel->name, function($cells){
        			$cells->setAlignment('left');
        		});
        		$sheet->cell('G3', 'Tahun Ajar', function($cells){
        			$cells->setAlignment('left');
        		});
        		$sheet->mergeCells('G3:H3');
        		$sheet->cell('I3', ': '.\Config::get('kalender.year'), function($cells){
        			$cells->setAlignment('left');
        		});
        		$sheet->cell('G4', 'Semester', function($cells){
        			$cells->setAlignment('left');
        		});
        		$sheet->mergeCells('G4:H4');
        		$sheet->cell('I4', ': '.\Config::get('kalender.semester'), function($cells){
        			$cells->setAlignment('left');
        		});

        		$sheet->row(6, [
    				'id' ,'NISN', 'NAME', 
    				'Alfa', 'Izin', 'Sakit', 'Pramuka', 
    				'UKS', 'desc'
    			]);
        		$sheet->row(6, function ($row){
        			$row->setFontFamily('Times New Roman');
        			$row->setFontWeight('bold');
        		});
    			$sheet->setFreeze('A7');
				$sheet->fromArray($data, null, 'A7', true, false);
			})->export('xls');
	}
}