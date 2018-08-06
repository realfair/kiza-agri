function saveModal(url,data,redirectUrl){
	var message="Mutegereze gato....";
	var successMessage="Byakoze neza....";
	var modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>'+message+'<br/><img class=\'uk-margin-top\' src=assets/img/loader/loader.gif style=\width:100px\ alt=\'\'>');
	$.post(url,{
		info:data
	},function(data){
		modal.hide();
		if(data.match(successState())){
			alert(successMessage);
			location.reload();
		}else if(data.match(systemError())){
			alert(systemErrorMsg());	
		}else{
			alert(data);
		}
	});

}

function confirmModal(url,data,message,successMessage,redirectUrl){
	UIkit.modal.confirm(message, function(){
			var modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>Mutegereze gato......<br/><img class=\'uk-margin-top\' src=assets/img/loader/loader.gif style=\width:100px\ alt=\'\'>');
	$.post(url,{
		info:data
	},function(data){
		modal.hide();
		//alert(data);
		if(data.match(successState())){
			alert(successMessage);
			window.location=redirectUrl;
		}else if(data.match(systemError())){
			alert(systemErrorMsg());	
		}else{
			alert(data);
		}
	});
	});
}

function display_errors(error){
	UIkit.modal.alert(error);
}
function ValidateEmail(mail) 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
  {
    return (true)
  }else{
  	 return (false)
  }
   
}

function validate_string(data){
	var state=false;
	mystring = data;
validRegEx = /^[^\\\/&]*$/
if(mystring.match(validRegEx)){
	state=true;
}else{
	state=false;
}
return state;
}

function confirmPassword(pass,cpass){
	var state=false;
	if(pass.match(cpass)){
		state=true;
	}else{
		state=false;
	}
	return state;
}
function check_phone(str){
	var patt = new RegExp(/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im);
  return patt.test(str);
}