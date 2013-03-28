<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MultiUpload extends CI_Upload{
	
	function mupload($configs,$files){
		if(count($configs) != count($files)){
			return 'array_count_wrong';
		}
		
		$retArr=array();
		
		for($i=0, $j = count($files);$i<$j;$i++){
			$this->initialize($configs[$i]);
			if(!$this->do_upload($files[$i])){
				array_push($retArr,$this->display_errors());
			}else{
				array_push($retArr,'OK');
			}
		}
    return($retArr);
	}
}

/* End of file Navigation.php */