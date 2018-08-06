$(document).ready(function(){
	var url="save_system_data";
	var input=[];
	var coop_url="dashboard";
	$("#activateAll").click(function(){
		input[0]="";
		saveData(url,input,"activate_all_cooperatives",coop_url);
	});
	$("#frm_save_crop").submit(function(e){
		e.preventDefault();
		var crop=$("#crop").val();
		saveCrop(crop);
	});
	$("#frm_save_fertilizer").submit(function(e){
		e.preventDefault();
		var fertilizer=$("#fertilizer").val();
		saveData(url,fertilizer,"save_fertilizer","fertilizers_all");
	});

	$("#frm_save_pesticide").submit(function(e){
		e.preventDefault();
		var pesticide=$("#pesticide").val();
		saveData(url,pesticide,"save_pesticide","pesticide_all");
	});
	$("#frm_save_grade").submit(function(e){
		e.preventDefault();
		var grade=$("#txtGrade").val();
		var cropKey=$("#cropKey").val();
		if(grade.length>0){
			input[0]=cropKey;
			input[1]=grade;
			saveData(url,input,"save_crop_grade","crops_all");
		}else{
			alert("Please enter Grade");
		}
	});
	$("#frm_save_user").submit(function(e){
		e.preventDefault();
		var user_names=$("#user_names").val();
		var user_mail=$("#user_mail").val();
		var user_password=$("#user_password").val();
		var c_password=$("#c_password").val();
		if(user_password.length>=6){
			if(user_password===c_password){
				if(user_names.length>=3){
					input[0]=user_names;
					input[1]=user_mail;
					input[2]=user_password;
					saveData(url,input,"save_user","users");
				}else{
					alert("Invalid Names");
					resetUserForm();				}
			}else{
				alert("Password do not match");
				resetUserForm();
			}
		}else{
			alert("Password must be atleast 6 characters");
			resetUserForm();
		}
	});
	//function to reset user
	function resetUserForm(){
		$("#user_names").val("");
		$("#user_mail").val("");
		$("#user_password").val("");
		$("#c_password").val("");
	}
	//function to check password confirmation
	function confirmPassword(pass,cpass){
		var state=false;
		if(pass.match(cpass)){
			state=true;
		}else{
			state=false;
		}
		return state;
	}

	$("#frm_send_message").submit(function(e){
		e.preventDefault();
		var cooperative=$("#cooperative").val();
		var admin=$("#admin").val();
		var messageTitle=$("#messageTitle").val();
		var category=$("#category").val();
		var messageBody=$("#messageBody").val();
		input[0]=admin;
		input[1]=cooperative;
		input[2]=messageTitle;
		input[3]=category;
		input[4]=messageBody;
		saveData(url,input,"send_message",coop_url);
	});
	$("#send_comment").submit(function(e){
		e.preventDefault();
		//grab comment
		var comment=$("#comment").val();
		input[0]=message;
		input[1]=user;
		input[2]=cooperative;
		input[3]=comment;
		saveData(url,input,"add_comment","coop_conversation?conversation="+message);
	});
	$("a.close").click(function(){
		var action=$(this).attr("action");
		input[0]=action;//
		var confirms=window.confirm("Do you really want to remove this comment [NO UNDONE ACTION]");
		if(confirms){
			saveData(url,input,"remove_comment","coop_conversation?conversation="+message);
		}
		
	});
	loadGrades($("#crop_key_section").val());
	$("#crop_key_section").change(function(){
		var crop=$(this).val();
		loadGrades(crop);
	});
	$("#crop_grade_section").change(function(){
		var grade=$(this).val();
	});
	$("#frm_save_variety").submit(function(e){
		e.preventDefault();
		var crop=$("#crop_key_section").val();
		var grade=$("#crop_grade_section").val();
		var variety=$("#txtVariety").val();
		if(crop.length>0 && grade.length>0 && variety.length>0){
			input[0]=crop;
			input[1]=grade;
			input[2]=variety;
			saveData(url,input,"save_variety","crops_all");
		}else{
			alert("Invalid Data provided");
		}
	});
});
function loadGrades(crop){
	$.ajax({
		url:"crop_grades?crop="+crop,
		method:'GET',
		data:crop,
		dataType: 'json'
	}).done(function(data){
		$("#crop_grade_section>option").remove();
		$.map(data, function(grade, i){
			$("#crop_grade_section").append('<option value='+grade.gradeId+'>'+grade.grade+'</option>');
		});
	});
}
function saveCrop(crop){
	var url="save_system_crop";
	$.post(url,{
		crop:crop
	},function(data){
		if(data.match("200")){
			alert("successfully saved");
			window.location="crops_all";
		}else{
			alert(data);
		}
	});
}

function saveData(url,data,action,redirectUrl){
	$.post(url,{
		action:action,
		data:data
	},function(data){
		if(data.match("200")){
			alert("successfully action Done.");
			window.location=redirectUrl;
		}else{
			alert(data);
		}
	});
}