<?php namespace App\Http\Excel;

use App\Kelas;
use Maatwebsite\Excel\Files\ImportHandler;

/**
* 
*/
class KelasImportHandler implements ImportHandler
{
    public function handle($import)
    {
    	$results = $import->get()->toArray();

    	try {
            foreach ($results as $row) {
                Kelas::firstOrCreate($row);
            }
            flash()->success('Berhasil mengimport data dari excel.');
        } catch (\Exception $e) {
            flash()->error('Error Message: '.$e->getMessage());
        }
    }
}
