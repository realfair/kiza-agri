$(document).ready(function(){
	var requestUrl="save_fertilizer";
	var data=[];
	var redirectUrl="fertilizers";

	$("#frm_add_fertilizer").submit(function(e){
		e.preventDefault();
		data[0]="save_fertilizer";
		data[1]=$("#fertilizer").val();
		data[2]=$("#fertilizer_quantity").val();
		data[3]=$("#cooperative").val();
		//alert(data[3]);
		saveModal(requestUrl,data,redirectUrl);
	});
});