<?php namespace App\Http\Excel;

use App\Course;
use Maatwebsite\Excel\Files\ImportHandler;

/**
* 
*/
class CourseImportHandler implements ImportHandler
{
    public function handle($import)
    {
    	$results = $import->get()->toArray();

    	try {
            foreach ($results as $row) {
                Course::firstOrCreate($row);
            }
            flash()->success('Berhasil mengimport data dari excel.');
        } catch (\Exception $e) {
            flash()->error('Error Message: '.$e->getMessage());
        }
    }
}
