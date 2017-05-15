<?php namespace App\Http\Excel;

use Maatwebsite\Excel\Files\ImportHandler;

/**
*
*/
class BlangkoImportHandler implements ImportHandler
{
	public function handle($import)
	{
		$data = $import->get([
    		'id' ,
    		'NH', 'UTS', 'UAS', 'desc_knowledge', 
    		'NPr', 'NPj', 'NPo', 'desc_skill',
    		'NO', 'NDs', 'NAt', 'Nj', 'desc_attitude'
    	])->toArray();
    	try{
    		foreach ($data as $row) {
    			$score_knowledge = round(((($row['NH'] + $row['UTS'] + $row['UAS']) / 3) / 100) * 4, 2);
        		$score_skill = round(((($row['NPr'] + $row['NPj'] + $row['NPo']) / 3) / 100) * 4, 2);
	        	$score_attitude = round(((($row['NO'] + $row['NDs'] + $row['NAt'] + $row['Nj']) / 4) / 100) * 4, 2);
   				\DB::table('rapors')->where('id', $row['id'])->update($row);
   				$rapor = \DB::table('rapors')->where('id', $row['id'])->update([
   					'score_knowledge'  => $score_knowledge,
	   				'letter_knowledge' => $this->huruf($score_knowledge),
   					'score_skill'  	   => $score_skill,
   					'letter_skill'     => $this->huruf($score_skill),
   					'score_attitude'   => $score_attitude,
   					'letter_attitude'  => $this->sikap($score_attitude),
   				]);
	    	}

	    	flash()->success('Success! Mengimport data dari Excel');
	    	return redirect()->route('teacher.akademik');
    	}catch(\Exception $e){
    		flash()->error('Error Message: '.$e->getMessage());
    		return redirect()->route('teacher.akademik');
    	}
    	
	}

	private function huruf($score)
    {
        if ($score > 3.66)
        {
            return 'A';
        } elseif ($score > 3.33 && $score < 3.67)
        {
            return 'A-';
        } elseif ($score > 3 && $score < 3.34)
        {
            return 'B+';
        } elseif ($score > 2.66 && $score < 3.01)
        {
            return 'B';
        } elseif ($score > 2.33 && $score < 2.67)
        {
            return 'B-';
        } elseif ($score > 2 && $score < 2.34)
        {
            return 'C+';
        } elseif ($score > 1.66 && $score < 2.01)
        {
            return 'C';
        } elseif ($score > 1.33 && $score < 1.67)
        {
            return 'C-';
        } elseif ($score > 1 && $score < 1.34)
        {
            return 'D+';
        }

        return 'D';
    }

    private function sikap($score){
        if ($score > 3.5)
        {
            return 'SB';
        } elseif ($score > 2.51 && $score < 3.49)
        {
            return 'B';
        } elseif ($score > 1.51 && $score < 2.50)
        {
            return 'C';
        } elseif ($score > 1.01 && $score < 1.50)
        {
            return 'K';
        } 

        return '-';
    }
}