<?php namespace App\Http\Excel;

use App\Student;
use Maatwebsite\Excel\Files\ImportHandler;

/**
* 
*/
class StudentImportHandler implements ImportHandler
{
    public function handle($import)
    {
        $results = $import->get()->toArray();

        try {
            foreach ($results as $row) {
                Student::firstOrCreate($row);
            }
            flash()->success('Berhasil mengimport data dari excel.');
        } catch (\Exception $e) {
            flash()->error('Error Message: '.$e->getMessage());
        }
    }
}
