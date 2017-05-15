<?php namespace App\Http\Excel;

use App\Section;
use Maatwebsite\Excel\Files\ImportHandler;

/**
* 
*/
class SectionImportHandler implements ImportHandler
{
    public function handle($import)
    {
    	$results = $import->get()->toArray();

    	try {
            foreach ($results as $row) {
                Section::firstOrCreate($row);
            }
            flash()->success('Berhasil mengimport data dari excel.');
        } catch (\Exception $e) {
            flash()->error('Error Message: '.$e->getMessage());
        }
    }
}
