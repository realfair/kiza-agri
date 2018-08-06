$(document).ready(function(){
	var member;
	var url="save_harvest";
	var data=[];
	var message="Mutegereze gato";
	var deleteMessage=deleteCropMsg();
	var successMessage=deleteSuccessMsg();
	var redirectUrl="harvest";
	$("#cooperative_members").change(function(){
		member=$(this).val();
	});
	$("#frm_add_harvest").submit(function(e){
		e.preventDefault();
		var coop_crop=$("#coop_crop_name").val();
		var cropGrade=$("#coopCropsGrades").val();
		var gradeVariety=$("#cropsVariety").val();
		var member_harvest=$("#member_harvest").val();
		var cooperative_harvest=$("#cooperative_harvest").val();
		var cooperative=$("#cooperative").val();
		member=$("#cooperative_members").val();
		//alert(coop_crop+"\n"+cropGrade+"\n"+gradeVariety+"\n"+member_harvest+"\n"+cooperative_harvest+"\n"+cooperative);
		data[0]=url;
		data[1]=coop_crop;
		data[2]=cropGrade;
		data[3]=gradeVariety;
		data[4]="";
		data[5]=cooperative;
		data[6]=member_harvest;
		data[7]=cooperative_harvest;
		data[8]=member;
		saveModal(url,data,message,redirectUrl);
	});
});