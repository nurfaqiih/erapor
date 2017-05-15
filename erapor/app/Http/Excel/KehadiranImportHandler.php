<?php namespace App\Http\Excel;

use App\Semester;
use Maatwebsite\Excel\Files\ImportHandler;

/**
* 
*/
class KehadiranImportHandler implements ImportHandler
{
	
	public function handle($import)
	{
		$data = $import->get([
			'id', 'NISN', 'NAME', 'Alfa', 'Izin', 'Sakit', 'Pramuka', 'UKS', 'desc',
		])->toArray();

		 try {
            foreach ($data as $row) {
				Semester::find($row['id'])->update([
					'alfa'    => $row['Alfa'],
					'izin'    => $row['Izin'],
					'sakit'   => $row['Sakit'],
					'pramuka' => $row['Pramuka'],
					'uks'     => $row['UKS'],
					'desc'    => $row['desc']
				]);
			}
            flash()->success('Berhasil Mengimport data dari excel.');
            return redirect(route('teacher.walas'));
        } catch (\Exception $e) {
            flash()->error('Error Message: '.$e->getMessage());

            return redirect(route('teacher.walas'));
        }
		
	}
}