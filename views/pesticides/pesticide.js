$(document).ready(function(){
	var requestUrl="save_pesticide";
	var data=[];
	var redirectUrl="pesticides";
	var url="give_pesticide";
	var data=[];
	$("#frm_add_pesticide").submit(function(e){
		e.preventDefault();
		data[0]="save_pesticide";
		data[1]=$("#fertilizer").val();
		data[2]=$("#fertilizer_quantity").val();
		data[3]=$("#cooperative").val();
		//alert(data[3]);
		saveModal(requestUrl,data,redirectUrl);
	});
	$("a.givePesticide").click(function(){
		var action=$(this).attr("action");
		var pesticide=$(this).attr("pesticide");
		var data1=$(this).attr("data");
		var coop=$(this).attr("coop");
		data[0]="give_pesticide";
		data[1]=action;
		data[2]=data1;
		UIkit.modal.prompt('Shyiramo ingano mu biro, '+pesticide+':', '', function(val){
			var ingano;
			if(val){
				ingano=val;
				if((ingano>0) && (ingano<=100)){
					data[3]=val;
					data[4]=coop;
					saveModal(url,data,"pesticides");
				}else{
					alert("Ibyo washyizmo ntabwo aribyo");
				}
			}else{
				alert("Shyiramo ingano.");
			} 
		});
	});


});