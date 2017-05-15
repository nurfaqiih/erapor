<?php namespace App\Http\Excel;

use App\User;
use Maatwebsite\Excel\Files\ImportHandler;

/**
* 
*/
class UserImportHandler implements ImportHandler
{
    public function handle($import)
    {
        $results = $import->get()->toArray();
        try {
            foreach ($results as $row) {
                User::firstOrCreate($row);
            }
            flash()->success('Berhasil mengimport data dari excel.');
        } catch (\Exception $e) {
            flash()->error('Error Message: '.$e->getMessage());
        }

    }
}
