<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/kiza/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/kiza/check/information_check.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/kiza/class_loader.php';

$user_id=$_SESSION['user_id'];
$names=$_SESSION['names'];
$user_type=$_SESSION['user_type'];
//get user cooperative
$cooperativeId=$cooperative->getUserCooperative($user_id);
$cooperativeName=$cooperative->getCooperativeFieldData($cooperativeId,"name");
?>
<!doctype html>
<html lang="en">
<head>
    <?php include 'views/utils/home_meta.php'; ?>
    <title>
        <?php echo "Ikaze ".$names; ?>
            
        </title>
    <?php include 'views/utils/home_stylesheet.php'; ?>
</head>