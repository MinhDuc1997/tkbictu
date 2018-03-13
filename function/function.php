<?php 
require_once 'date.php';

ini_set('display_errors', 'off');
ini_set('log_errors', 'on');
ini_set('error_log','log/log-error.log');

function get_tkb($url_file,$time__){
	$get_json_file_html_local = file_get_html($url_file,true);
	$array=json_decode($get_json_file_html_local,true);

	for($i=0;$i<200;$i++){
		$date = $array['data']['current']['table'][$i]['subjectDate'];
		$name_subjects = $array['data']['current']['table'][$i]['subjectId'];
		$time_subjects = $array['data']['current']['table'][$i]['subjectTime'];
		$room = $array['data']['current']['table'][$i]['subjectPlace'];
		$test_null = strlen($date);

		if($test_null>0){
			$time_repalce = str_replace('/', '-', $date);
			$time_conver = strtotime($time_repalce);
	    	$time_format = date('d/m/Y',$time_conver);

			if($time_format == $time__){
				$name_subjects_ = strstr($name_subjects,'-',true);
				echo "Môn: ".$name_subjects_."<br>";
				echo "Tiết: ".$time_subjects."<br>";
				echo "Phòng: ".$room."<br><br>";

				}
			}
			
		else{return flase;}	
		}
	}

?>