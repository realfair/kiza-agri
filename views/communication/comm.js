$(document).ready(function(){
	var requestUrl="save_comment";
	var data=[];
	var redirectUrl="pesticides";

	$("#btn_add_comment").click(function(){
		var message=$(this).attr("action");
		var comment=$("#txt_comment").val();
		var user=$(this).attr("user");
		var coop=$(this).attr("coop");
		if(comment.length>=5 && user.length>0){
			data[0]="save_comment";
			data[1]=message;
			data[2]=coop;
			data[3]=user;
			data[4]=comment;
			saveModal(requestUrl,data,redirectUrl);
		}else{
			alert("Ubutumwa bwumvikana burakenewe.");
		}
	});
});