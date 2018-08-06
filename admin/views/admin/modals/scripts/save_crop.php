<?php 
if(isset($_POST['crop'])){
	$root_url=$_SERVER['DOCUMENT_ROOT'].'/kiza/admin/';
	$class_loader_url=$root_url.'class_loader.php';
	require_once $class_loader_url;
	$crop=$function->sanitize($_POST['crop']);
	$save_status=$admin->saveCrop($crop);
	if($save_status){
		echo "200";
	}else{
		echo "403";
	}
}else{
	echo "500";
}
?>