$(document).ready(function(){

	$("#frm_login").submit(function(e){
		e.preventDefault();
		var username=$("#login_username").val();
		var password=$("#login_password").val();
		if(password.length>=5){
			if(username.length>=3){
				loginRequest(username,password);
			}else{
				display_errors("Izina ryo kwinjira rigomba kuva nibura inyuguti 3");
			}
		}else{
			display_errors("Ijambo ry'ibanga rigomba kuba nibura inyuguti 6");
		}
	});
});

function loginRequest(username,password){
	var msg="Mutegereze gato...";
	var modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>'+msg+'...<br/><img class=\'uk-margin-top\' src=assets/img/loader/loader.gif style=\width:100px\ alt=\'\'>');
	$.post(cooperative_login(),{
		username:username,
		password:password
	},function(data){
		modal.hide();
		if(data.match(successState())){
			redirectTo(dashboard());
		}else if(data.match(systemError())){
			display_errors(systemErrorMsg());
		}else if(data.match(forbiddenError())){
			display_errors(invalid_credentials());
		}else{
			display_errors(data);
		}
	});
}