<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/kiza/class_loader.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
	$data=$_POST['info'];
	if(is_array($data)){
		//grab action
		$action=$function->sanitize($data[0]);
		if($action=="save_comment"){
			//grab other data
			$messageId=$function->sanitize($data[1]);
			$senderId=$function->sanitize($data[2]);
			$receiverId=$function->sanitize($data[3]);
			$comment=$function->sanitize($data[4]);

			$save_comment_status=$cooperative->saveMessageComment($messageId,$senderId,$receiverId,$comment);
			if($save_comment_status){
				echo $errors->successState();
			}else{
				echo $errors->systemError();
			}
		}
	}else{
		echo $errors->forbiddenError();
	}
}else{
	echo $errors->forbiddenError();
}
?>