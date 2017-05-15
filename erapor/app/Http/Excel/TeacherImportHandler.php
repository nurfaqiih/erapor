<?php namespace App\Http\Excel;

use App\Teacher;
use Maatwebsite\Excel\Files\ImportHandler;

/**
* 
*/
class TeacherImportHandler implements ImportHandler
{
    public function handle($import)
    {
        $results = $import->get()->toArray();

        try {
            foreach ($results as $row) {
                Teacher::firstOrCreate($row);
            }
            flash()->success('Berhasil mengimport data dari excel.');
        } catch (\Exception $e) {
            flash()->error('Error Message: '.$e->getMessage());
        }
    }
}
