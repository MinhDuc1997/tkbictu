<?php
require_once '../config.php';
require_once '../lib/simple_html_dom.php';
	
	$u = $_POST['msv'];
	$p = $_POST['pass'];

	$get_token = new token;

	$get_token->set_msv($u);
	$get_token->set_pass($p);

	$get_json_token = file_get_html($get_token->get_token());
	$array = json_decode($get_json_token,true);
	$token = $array['access-token'];

	require_once 'info.php';
	require_once 'schedule.php';

	$url_callback = $con->get_domain()."/mytkb";
	$url_origin = $con->get_domain();
	if($token != NULL){
		header("location:$url_callback");
	}
	else{
		header("location:$url_origin");
	}
?>