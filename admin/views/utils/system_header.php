<?php 
$root_url=$_SERVER['DOCUMENT_ROOT'].'/kiza/admin/';
$class_loader_url=$root_url.'class_loader.php';
$auth_url=$root_url.'auth.php';
require_once $auth_url;
include_once $class_loader_url;

$userId=$_SESSION['userId'];
$userName=$_SESSION['userName'];
$userType=$_SESSION['userType'];
//define urls
$urls=array();
$urls['load_messages']=$root_url.'views/admin/messages/load_messages.php';
$urls['conversation']=$root_url.'views/admin/messages/conversation.php';
$urls['load_cooperatives']=$root_url.'views/admin/load_cooperatives.php';
$urls['load_cooperative_members']=$root_url.'views/admin/load_cooperative_members.php';
$urls['load_system_crops']=$root_url.'views/admin/load_crops.php';
$urls['load_system_users']=$root_url.'views/admin/load_users.php';
$urls['load_system_fertilizers']=$root_url.'views/admin/load_fertilizers.php';
$urls['load_system_pesticides']=$root_url.'views/admin/load_pesticides.php';
$urls['add_crop']=$root_url.'views/admin/modals/add_crop.php';
$urls['add_grade']=$root_url.'views/admin/modals/add_grades.php';
$urls['add_variety']=$root_url.'views/admin/modals/add_variety.php';
$urls['add_message']=$root_url.'views/admin/modals/add_message.php';
$urls['add_fertilizer']=$root_url.'views/admin/modals/add_fertilizer.php';
$urls['add_pesticide']=$root_url.'views/admin/modals/add_pesticide.php';
$urls['add_user']=$root_url.'views/admin/modals/add_user.php';

$urls['load_cooperative_crops']=$root_url.'views/admin/cooperatives/cooperative_crops.php';
$urls['load_cooperative_harvest']=$root_url.'views/admin/cooperatives/cooperative_harvest.php';//
$urls['load_cooperative_pricing']=$root_url.'views/admin/cooperatives/cooperative_pricing.php';
$urls['cooperative_fertilizers']=$root_url.'views/admin/cooperatives/cooperative_fertilizers.php';
$urls['cooperative_pesticide']=$root_url.'views/admin/cooperatives/cooperative_pesticide.php';
$urls['cooperative_land']=$root_url.'views/admin/cooperatives/cooperative_land.php';
?>

<!DOCTYPE html>
<html lang="en">
<?php 
include 'views/utils/data_stylesheet.php';
?>