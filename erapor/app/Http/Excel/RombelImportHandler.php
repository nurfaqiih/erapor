<?php namespace App\Http\Excel;

use App\Rombel;
use Maatwebsite\Excel\Files\ImportHandler;

/**
* 
*/
class RombelImportHandler implements ImportHandler
{
    public function handle($import)
    {
        $results = $import->get()->toArray();

        try {
            foreach ($results as $row) {
                Rombel::firstOrCreate($row);
            }
            flash()->success('Berhasil mengimport data dari excel.');
        } catch (\Exception $e) {
            flash()->error('Error Message: '.$e->getMessage());
        }
    }
}
