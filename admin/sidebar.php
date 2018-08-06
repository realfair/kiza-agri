<?php 
$root_url=$_SERVER['DOCUMENT_ROOT'].'/kiza/admin/';
$auth_url=$root_url.'auth.php';
require_once $auth_url;

$userId=$_SESSION['userId'];
$userType=$_SESSION['userType'];
if($userType==1){
	include $root_url.'views/menu/Admin.menu.php';
}
?>