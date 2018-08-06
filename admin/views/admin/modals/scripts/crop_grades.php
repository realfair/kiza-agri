<?php
$root_url=$_SERVER['DOCUMENT_ROOT'].'/kiza/admin/';
require $root_url.'class_loader.php';
if(isset($_GET['crop'])){
	$cropId=$function->sanitize($_GET['crop']);
	$grades=$admin->getCropGrades($cropId);
	echo json_encode($grades);
}elseif(isset($_GET['grade'])){
	$gradeId=$function->sanitize($_GET['grade']);
	$varieties=$admin->getGradeVarieties($gradeId);
	echo json_encode($varieties);
}
else{
	echo "500";
}

?>