<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/kiza/class_loader.php';
	if(isset($_GET['crop']) && isset($_GET['cooperative'])){
		$result=array();
		//get districts
		$crop=$function->sanitize($_GET['crop']);
		$cooperativeId=$function->sanitize($_GET['cooperative']);
		$systemCropGrades=array();
		$systemCropGrades=$cooperative->getCooperativeCropGrades($cooperativeId,$crop);
		
		foreach ($systemCropGrades as $key => $value) {
			$result[]=array("gradeId"=>$value['grade'],"gradeName"=>$system->selectTableField("cropsgrade","grade","gradeId",$value['grade']));
		}
		echo json_encode($result);
	}else{
		echo "string";
	}
?>