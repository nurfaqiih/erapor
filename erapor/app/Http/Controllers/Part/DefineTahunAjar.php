<?php namespace App\Http\Controllers\Part;

use Carbon\Carbon;

trait DefineTahunAjar {

	public function tahunAjar()
	{
		# code...
		if (Carbon::now()->month > 6)
        {

            return [Carbon::now()->year . '/' . (Carbon::now()->year + 1), 1];
        }

        return [(Carbon::now()->year - 1) . '/' . Carbon::now()->year, 2];
	}
}
