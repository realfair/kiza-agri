$(function(){
	var initialProvince=$("#province").val();
	loadDistricts(initialProvince);
	showLoader();
	$("#province").change(function(){
		var province=$(this).val();
		//send ajax request
		$("#districts").val("");
		loadDistricts(province);
	});

	$("#districts").change(function(){
		var district=$(this).val();
		//alert(district);
	});

	$("#frm_coop_reg").submit(function(e){
		e.preventDefault();
		var coo_name=$("#coo_name").val();
		var coo_phone=$("#coo_phone").val();
		var province=$("#province").val();
		var districts=$("#districts").val();
		var tin_number=$("#tin_number").val();
		var president=$("#president").val();
		var password=$("#password").val();
		var cpassword=$("#cpassword").val();

		if(length_checker(coo_name)){
			if(validate_string(coo_name)){
				if(check_phone(coo_phone)){
					if(province.length>0){
						if(districts.length>0){
							if(length_checker(president)){
								if(length_checker(password)){
									if(confirmPassword(password,cpassword)){
										registerCooperative(coo_name,coo_phone,province,districts,tin_number,president,password);
									}else{
										display_errors(unmatch_password());
									}
								}else{
									display_errors(invalid_password());
								}
							}else{
								display_errors(invalid_president_name());
							}
						}else{
							display_errors(invalid_district());
						}
					}else{
						display_errors(invalid_province());
					}
				}else{
					display_errors(invalid_phone());
				}
			}else{
				display_errors(invalid_name());
			}
		}else{
			display_errors(name_error());
		}
	});
});

function display_errors(error){
	UIkit.modal.alert(error);
}

function registerCooperative(coo_name,coo_phone,province,districts,tin_number,president,password){
	var msg="Mutegereze gato...";
	var modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>'+msg+'...<br/><img class=\'uk-margin-top\' src=assets/img/loader/loader.gif style=\width:100px\ alt=\'\'>');
	$.post(register_cooperative(),{
		coo_name,
		coo_phone,
		province,
		districts,
		tin_number,
		president,
		password
	},function(data){
		modal.hide();
		if(data.match(successState())){
			alert("Koperative yanditswe ntakibazo. Ubu mushobora kujya muri Konti yanyu.");
			location.reload();
		}else if(data.match(systemError())){
			display_errors("systemError error");
		}else if(data.match(forbiddenError())){
			display_errors("Not all data submitted");
		}else{
			display_errors(data);
		}
	});
}
function length_checker(str){
	var state=false;
	if(str.length>=3){
		state=true;
	}else{
		state=false;
	}

	return state;
}
function loadDistricts(province){
	$.ajax({
		url:"load_districts?province="+province,
		method:'GET',
		data:province,
		dataType: 'json'
	}).done(function(data){
		$("#districts>option").remove();
		$.map(data, function(district, i){
			$("#districts").append('<option value='+district.districtId+'>'+district.name+'</option>');
		});
	});
}

function showLoader(){

}

function hideLoader(){

}