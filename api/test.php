<?php 
$root_url=$_SERVER['DOCUMENT_ROOT'].'/kiza/';
$class_loader=$root_url.'class_loader.php';
require $class_loader;
$seller_id=2;
$check=$cooperative->checkSellerId($seller_id);
if($check){
	echo "1";
}else{
	echo "0";
}
?>