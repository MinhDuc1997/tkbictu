<?php

class connect {
	protected $con; 
	protected $domain;
	var $msv;
	var $pass;

	function set_connect($con){
		$this->con = $con;
		}

	function set_domain($domain){
		$this->domain = $domain;
		}

	function get_connect(){
		$connect = $this->connect;
		return $connect;
		}


	function get_domain(){
		$domain = $this->domain;
		return $domain;
		}

	function set_msv($u){
			$this->msv = $u;
		}

	function set_pass($p){
			$this->pass = $p;
		}
	}

class token extends connect {
	function get_token() {
		$u = $this->msv;
		$p = $this->pass;
        $json = "http://tnusocial.otvina.com/api/school/api.php?api=login-app&from=DTC&app-id=475681656679&app-secret=LsO189xl1p5b5673t87pQ05w6d3k9KeP&username=$u&password=$p";
        return $json;
		}
	}

class info {
	function get_info($token){
		$json = "http://tnusocial.otvina.com/api/school/api.php?api=get&path=user&from=DTC&access-token=$token";
		return $json;
		}
	}

class schedule {
	function get_schedule($token){
		$json = "http://tnusocial.otvina.com/api/school/api.php?api=get&path=student-time-table&from=DTC&access-token=$token&semester=73FB2DDC455D410C978AB31459812122";
		return $json;
		}
	}
?>