<?php
require 'class_loader.php';
// $systemCrops=$admin->crop_data();
$data=file_get_contents("http://localhost/kiza/admin/test.php");
$json=json_decode($data);
//var_dump($json);
for($i=0;$i<count($json);$i++){
	$obj=$json[$i]->crop_name;
}
?>