$(document).ready(function(){
	$("#frm_login").submit(function(e){
		e.preventDefault();
		var email=$("#email").val();
		var password=$("#password").val();
		loginRequest(email,password);
	});
});
function loginRequest(email,password){
	var url="login_user";
	showLoader();
	$.post(url,{
		email:email,
		password:password
	},function(data){
		hideLoader();
		if(data.match("200")){
			window.location="dashboard";
		}else if(data.match("500")){
			showError("Please check your email and password");
		}else{
			showError(data);
		}
	});
}
function showLoader(){
	$("#loader").show();
	$("#errors").hide();
}
function hideLoader(){
	$("#loader").hide();
}
function showError(msg){
	$("#errors").show().html(msg);
	$("#loader").hide();
}