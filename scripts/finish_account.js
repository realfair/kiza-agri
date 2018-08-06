$(document).ready(function(){
	$("#frm_finish").submit(function(e){
		e.preventDefault();
		var sector=$("#sector").val();
		var cooperative=$("#cooperative").val();
		updateSector(sector,cooperative);
	});
});

function updateSector(sector,cooperative){
	var msg="Mutegereze gato...";
	var requestUrl="save_setup";
	var modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>'+msg+'...<br/><img class=\'uk-margin-top\' src=assets/img/loader/loader.gif style=\width:100px\ alt=\'\'>');
	$.post(requestUrl,{
		sector:sector,
		cooperative:cooperative
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