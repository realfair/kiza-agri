<?php 
require 'class_loader.php';
$crop_data=$admin->crop_data();

foreach ($crop_data as $key => $value) {
	$varieties=$admin->getGradeVarieties($value['gradeId']);
	$final_data[]=array("cropId"=>$value['cropid'],"gradeId"=>$value['gradeId'],"crop_name"=>$value['name'],"grade_name"=>$value['grade'],"crop_status"=>$value['status'],"varieties"=>$varieties);
}
echo json_encode($final_data);
//var_dump($final_data);
?>