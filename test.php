<?php 
require 'class_loader.php';
$cooperativeId=7;
$messageId=5;
$senderId=7;
$receiverId=1;
$comment="Nice once kbsa";
$save_status=$cooperative->saveMessageComment($messageId,$senderId,$receiverId,$comment);
if($save_status){
	echo "saved";
}else{
	die(mysqli_error($conn));
}
?>