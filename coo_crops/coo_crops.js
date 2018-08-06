$(document).ready(function(){
	var crop=$("#crop_name").val();
	var url="save_crop";
	var data=[];
	var message="Mutegereze gato";
	var deleteMessage=deleteCropMsg();
	var successMessage=deleteSuccessMsg();
	var redirectUrl="crops";
	//load grades for initial crops
	loadCropsGrades(crop);
	var cropGrade=$("#cropsGrades").val();
	$("#crop_name").change(function(){
		crop=$(this).val();
		loadCropsGrades(crop);
	});
	$("#cropsGrades").change(function(){
		cropGrade=$(this).val();
	});
	$("#frm_add_crop").submit(function(e){
		e.preventDefault();
		var cooperativeId=$("#cooperativeId").val();
		cropGrade=$("#cropsGrades").val();
			//alert(cooperativeId+"\n"+crop+"\n"+cropGrade);
			data[0]="save_crop";
			data[1]=crop;
			data[2]=cropGrade;
			data[3]=cooperativeId;

			saveModal(url,data,message,redirectUrl);
		
	});
	$("a.deleteCrop").click(function(){
		var action=$(this).attr("action");
		data[0]="delete_crop";
		data[1]=action;
		data[2]="";
		data[3]="";

		confirmModal(url,data,deleteMessage,successMessage,redirectUrl);
	});
});

function loadCropsGrades(crop){
	$.ajax({
		url:"crop_grades?crop="+crop,
		method:'GET',
		data:crop,
		dataType: 'json'
	}).done(function(data){
		$("#cropsGrades>option").remove();
		$.map(data, function(grade, i){
			$("#cropsGrades").append('<option value='+grade.gradeId+'>'+grade.grade+'</option>');
		});
	});
}