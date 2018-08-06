<?php
error_reporting(0);
if(isset($_POST['action']) && isset($_POST['data'])){
	$root_url=$_SERVER['DOCUMENT_ROOT'].'/kiza/admin/';
	$class_loader_url=$root_url.'class_loader.php';
	require_once $class_loader_url;
	$action=$function->sanitize($_POST['action']);
	$name=$function->sanitize($_POST['data']);
	$save_status=$admin->saveData($action,$name);
	if($action=="send_message"){
		//get array data
		$data=$_POST['data'];
		if(is_array($data)){
			//extract array data
			$adminId=$function->sanitize($data[0]);
			$cooperativeId=$function->sanitize($data[1]);
			$title=$function->sanitize($data[2]);
			$category=$function->sanitize($data[3]);
			$body=$function->sanitize($data[4]);
			//save message
			$send_status=$admin->saveCooperativeMessage($adminId,$cooperativeId,$title,$body,$category);
			if($send_status){
				echo "200";
			}else{
				echo "403";
			}
		}else{
			echo "500";
		}
	}elseif($action=="add_comment"){
		$data=$_POST['data'];
		$messageId=$function->sanitize($data[0]);
		$senderId=$function->sanitize($data[1]);
		$receiverId=$function->sanitize($data[2]);
		$comment=$function->sanitize($data[3]);

		$comment_status=$admin->saveMessageComment($messageId,$senderId,$receiverId,$comment);
		if($comment_status){
			echo "200";
		}else{
			echo "403";
		}
	}elseif($action=="remove_comment"){
		$data=$_POST['data'];
		$commentId=$function->sanitize($data[0]);
		$remove_status=$admin->removeComment($commentId);
		if($remove_status){
			echo "200";
		}else{
			echo "403";
		}
	}elseif($action=="activate_all_cooperatives"){
		//activate all cooperatives
		$activate_status=$admin->activateAllCooperatives();
		if($activate_status){
			echo "200";
		}else{
			echo "403";
		}
	}elseif($action == "save_crop_grade"){
		//grab input[0] as crop and input[1] as grade
		$data=$_POST['data'];
		$cropId=$function->sanitize($data[0]);
		$grade=$function->sanitize($data[1]);
		//check if grade is not already registered
		$check_grade=$admin->checkCropGradeExistance($grade,$cropId);
		if(!$check_grade){
			$save_status=$admin->saveCropGrades($cropId,$grade,$status);
			if($save_status){
				echo "200";
			}else{
				echo "403";
			}
		}else{
			echo "That grade is already saved.";
		}
	}elseif($action == "save_user"){
		//grab input data
		$data=$_POST['data'];
		$user_names=$function->sanitize($data[0]);
		$user_mail=$function->sanitize($data[1]);
		$user_password=$function->sanitize($data[2]);

		$save_status=$admin->save_system_user($user_names,$user_mail,$user_password);
		if($save_status){
			echo "200";
		}else{
			echo "403";
		}
	}elseif($action == "save_variety"){
		//grab input data
		$data=$_POST['data'];
		$crop=$function->sanitize($data[0]);
		$gradeId=$function->sanitize($data[1]);
		$variety=$function->sanitize($data[2]);

		$save_status=$admin->save_variety($gradeId,$variety);
		if($save_status){
			echo "200";
		}else{
			echo "403";
		}
	}
	else{
		if($save_status){
			echo "200";
		}else{
			echo "403";
		}
	}
}elseif($_SERVER['REQUEST_METHOD']=="POST"){
	echo "yes";
}
else{
	echo "500";
}
?>