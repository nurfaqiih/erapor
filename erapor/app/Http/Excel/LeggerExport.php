<?php namespace App\Http\Excel;

use Maatwebsite\Excel\Files\NewExcelFile;

/**
* 
*/
class LeggerExport extends NewExcelFile
{
	public $id;

	public function setId($id){
		$this->id = $id;
	}

	public function getId($id){
		$this->id = $id;
	}
	
	public function getFilename(){
		return 'Legger';
	}
}