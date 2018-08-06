$(document).ready(function(){
	var url="give_fertilizer";
	var data=[];
	$("a.giveMember").click(function(){
		var action=$(this).attr("action");
		var fertilizer=$(this).attr("fertilizer");
		var data1=$(this).attr("data");
		var coop=$(this).attr("coop");
		data[0]="give_fertilizer";
		data[1]=action;
		data[2]=data1;
		UIkit.modal.prompt('Shyiramo ingano mu biro, '+fertilizer+':', '', function(val){
			var ingano;
			if(val){
				ingano=val;
				if((ingano>0) && (ingano<=100)){
					data[3]=val;
					data[4]=coop;
					saveModal(url,data,"fertilizers");
				}else{
					alert("Ibyo washyizmo ntabwo aribyo");
				}
			}else{
				alert("Shyiramo ingano.");
			} 
		});
	});
});