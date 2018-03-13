<?php

$get_info = new info();

$get_json_info = file_get_html($get_info->get_info($token));
$array = json_decode($get_json_info,true);

$id = $array['data']['id']; //ma sinh vien
$name =  $array['data']['name'];
$class =  $array['data']['class'];
$job = $array['data']['job']; //nganh hoc

setcookie("msv", $id, time() + 604800, "/");
setcookie("name", $name, time() + 604800, "/");
setcookie("class", $class, time() + 604800, "/");





?>