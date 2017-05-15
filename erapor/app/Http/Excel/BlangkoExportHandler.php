<?php namespace App\Http\Excel;

use App\Rapor;
use App\Rombel;
use App\Section;
use Maatwebsite\Excel\Files\ExportHandler;

/**
* 
*/
class BlangkoExportHandler implements ExportHandler
{
	
	public function handle($export)
	{
    $teacher = \Auth::user()->teacher;
    $section = Section::where('teacher_id', $teacher->id)->where('year', \Config::get('kalender.year'))->first();
    $rombel = Rombel::find($section->rombel_id);
    $rapors = Rapor::with('student')->where(['rombel_id' => $rombel->id, 'course_id' => $teacher->course_id, 'semester' => \Config::get('kalender.semester')]);
    foreach ($rapors->get() as $rapor) {
        $data[] = [
          'id'         => $rapor->id,
          'nis'        => $rapor->student->nis,
          'name'       => $rapor->student->name,
          'NH'         => $rapor->NH,
          'UTS'        => $rapor->UTS,
          'UAS'        => $rapor->UAS,
          'desc_knowledge' => $rapor->desc_knowledge,
          'NPr'        => $rapor->NPr,
          'NPj'        => $rapor->NPj,
          'NPo'        => $rapor->NPo,
          'desc_skill'     => $rapor->desc_skill,
          'NO'         => $rapor->NO,
          'NDs'        => $rapor->NDs,
          'NAt'        => $rapor->NAt,
          'NJ'         => $rapor->NJ,
          'desc_attitude'  => $rapor->desc_attitude,
        ];
      }

		return $export->sheet($rombel->name, function($sheet) use($data, $rapors, $rombel)
		{		
      // dd($rombel->name);
      $sheet->setStyle(array(
        'font' => array(
        'name'      =>  'Times New Roman',
        'size'      =>  12
      )));
      $count = $rapors->get()->count() + 6;
      $sheet->setBorder('A6:P'.$count, 'thin');
      

          // Header
          $sheet->mergeCells('A1:P1');
            $sheet->cell('A1', function($cell){
              $cell->setAlignment('center');
            });
            $sheet->row(1, ['BLANGKO NILAI PESERTA DIDIK']);
            $sheet->cell('A2', 'Sekolah');
            $sheet->mergeCells('A2:B2');
            $sheet->cell('C2', ': SMA Negeri 7 Padang');
            $sheet->cell('A3', 'Nama Pendidik');
            $sheet->mergeCells('A3:B3');
            $sheet->cell('C3', ': '.$rapors->first()->section->teacher->name, function($cells){
              $cells->setAlignment('left');
            });
            $sheet->cell('A4', 'NIP');
            $sheet->mergeCells('A4:B4');
            $sheet->cell('C4', ': '.$rapors->first()->section->teacher->nip, function($cells){
              $cells->setAlignment('left');
            });

            $sheet->cell('K2', 'Kelas');
            $sheet->mergeCells('N2:O2');
            $sheet->cell('P2', ': '.$rombel->name, function($cells){
              $cells->setAlignment('left');
            });
            $sheet->cell('K3', 'Tahun Ajar');
            $sheet->mergeCells('N3:O3');
            $sheet->cell('P3', ': '.\Config::get('kalender.year'), function($cells){
              $cells->setAlignment('left');
            });
            $sheet->cell('K4', 'Semester');
            $sheet->mergeCells('N4:O4');
            $sheet->cell('P4', ': '.\Config::get('kalender.semester'), function($cells){
              $cells->setAlignment('left');
            });

          // Data
          $sheet->row(6, [
            'id' ,'NISN', 'NAME', 
            'NH', 'UTS', 'UAS', 'desc_knowledge', 
            'NPr', 'NPj', 'NPo', 'desc_skill',
            'NO', 'NDs', 'NAt', 'Nj', 'desc_attitude'
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