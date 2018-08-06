$(document).ready(function(){
	var url="save_pricing";
	var data=[];
	var message="Mutegereze gato";
	var deleteMessage=deleteCropMsg();
	var successMessage=deleteSuccessMsg();
	var redirectUrl="pricing";
	var coop_crop=$("#coop_crop_name").val();
	var cooperative=$("#cooperative").val();
	var cropGrade;
	loadCooperativeCropsGrades(coop_crop,cooperative);
	cropGrade=$("#coopCropsGrades").val();
	if(cropGrade!=null){
		alert(cropGrade)
		loadCooperativeGradeVariety(cropGrade);
	}
	$("#coop_crop_name").change(function(){
		coop_crop=$(this).val();
		loadCooperativeCropsGrades(coop_crop,cooperative);
	});
	$("#coopCropsGrades").change(function(){
		cropGrade=$(this).val();
		loadCooperativeGradeVariety(cropGrade);
	});

	$("#frm_add_price").submit(function(e){
		e.preventDefault();
		var coop_crop=$("#coop_crop_name").val();
		var cropGrade=$("#coopCropsGrades").val();
		var gradeVariety=$("#cropsVariety").val();
		var input_price=$("#input_price").val();
		cooperative=$("#cooperative").val();
		
		data[0]="save_pricing";
		data[1]=coop_crop;
		data[2]=cropGrade;
		data[3]=gradeVariety;
		data[4]=input_price;
		data[5]=cooperative;

		saveModal(url,data,message,redirectUrl);
	});
});
function loadCooperativeCropsGrades(crop,cooperative){
	//alert(cooperative);
	$.ajax({
		url:"cooperative_crop_grade?crop="+crop+"&cooperative="+cooperative,
		method:'GET',
		data:crop,
		dataType: 'json'
	}).done(function(data){
		$("#coopCropsGrades>option").remove();
		$.map(data, function(grade, i){
			$("#coopCropsGrades").append('<option value='+grade.gradeId+'>'+grade.gradeName+'</option>');
		});

	});
}
function loadCooperativeGradeVariety(grade){
	$.ajax({
		url:"grade_varieties?grade="+grade,
		method:'GET',
		data:grade,
		dataType: 'json'
	}).done(function(data){
		$("#cropsVariety>option").remove();
		$.map(data, function(variety, i){
			$("#cropsVariety").append('<option value='+variety.varietyId+'>'+variety.name+'</option>');
		});
	});
}