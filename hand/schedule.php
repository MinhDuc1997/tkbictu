<?php

$get_schedule = new schedule();

$get_json_schedule = file_get_html($get_schedule->get_schedule($token));
if($token != NULL){
	$myfile = fopen("../file_data/$u.html", "w+");
	$data = $get_json_schedule;
	fwrite($myfile,$data);
	}

?>