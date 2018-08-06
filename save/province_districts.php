<?php 
	if(isset($_GET['province'])){
		require '../class_loader.php';
		$districts=array();
		//get districts
		$province=$function->sanitize($_GET['province']);
		$districts=$system->get_province_districts($province);
		echo json_encode($districts);
	}else{
		echo "string";
	}
?>