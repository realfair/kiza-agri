<?php
if(isset($_POST['coo_name']) && isset($_POST['coo_phone']) && isset($_POST['province']) && isset($_POST['districts']) && isset($_POST['tin_number']) &&isset($_POST['president']) && isset($_POST['password'])){

	//load modules
	require '../class_loader.php';
	$coo_name=$function->sanitize($_POST['coo_name']);
	$coo_phone=$function->sanitize($_POST['coo_phone']);
	$province=$function->sanitize($_POST['province']);
	$districts=$function->sanitize($_POST['districts']);
	$tin_number=$function->sanitize($_POST['tin_number']);
	$president=$function->sanitize($_POST['president']);
	$password=$function->sanitize($_POST['password']);

	//validate inputs again
	if(strlen($coo_name)>=3){
			if(strlen($province)>0){
				if(strlen($districts)>0){
					if(strlen($president)>=3){
						if(strlen($password)>=5){
							//save cooperative record
							$save_status=$cooperative->registerCooperative($coo_name,$coo_phone,$districts,$tin_number,$president,$password);
							if($save_status){
								echo "200";
							}else{
								echo "403";
							}
						}else{
							echo $errors->pass_error();
						}
					}else{
						echo "Mugomba gushyiramo amazina ya perezida neza";
					}
				}else{
					echo "akarere ntako mwahisemo";
				}
			}else{
				echo "Intara ntayo mwahisemo";
			}
	}else{
		echo $errors->coop_name_error();
	}
}else{
	echo "500";
}
?>