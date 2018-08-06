$(document).ready(function(){
    $("#frm_add_member").off("submit");
	$("#frm_add_member").submit(function(e){
		e.preventDefault();
		var names=$("#names").val();
		var id_no=$("#id_no").val();
		var phone=$("#phone").val();
		var dob=$("#dob").val();
		var gender=$("#gender").val();
		var cooperative=$("#cooperative").val();
		if(id_no.length<=16){
			saveMember(names,id_no,phone,dob,gender,cooperative);
		}else{
			display_error("Nomero y' irangamuntu ntigomba kurenga 16");
		}
	});

	$("a.deleteMember").click(function(){
		var action=$(this).attr("action");
		
	});
});

function saveMember(names,id_no,phone,dob,gender,cooperative){
	var msg="Mutegereze gato...";
	var requestUrl="save_member";
	var redirectUrl="members";
	var modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>'+msg+'...<br/><img class=\'uk-margin-top\' src=assets/img/loader/loader.gif style=\width:100px\ alt=\'\'>');
	$.post(requestUrl,{
		names:names,
		id_no:id_no,
		phone:phone,
		dob:dob,
		gender:gender,
		cooperative:cooperative
	},function(data){
		modal.hide();
		if(data.match(successState())){
			redirectTo(redirectUrl);
		}else if(data.match(systemError())){
			display_errors(systemErrorMsg());
		}else if(data.match(forbiddenError())){
			display_errors("Hari ikibazo");
		}else{
			display_errors(data);
		}
	});
}