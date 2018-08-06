$(document).ready(function(){
	//sellDiv
	$(".sellBtn").click(function(){
		sellingDiv();
	});
	$(".sellB").click(function(){
		var ourQuanity=$(".ourQ").val();
		var sellingQuantity=$(".sellQ").val();
		var requiredQ=$(".requiredQ").val();
		var variety=$(".requiredQ").val();
		var sellerKey=$(".sellerKey").val();
		var cooperativeKey=$(".cooperativeKey").val();
		if(sellingQuantity<=requiredQ){
			if(sellingQuantity<=ourQuanity){
				selling(cooperativeKey,sellerKey,variety,ourQuanity,sellingQuantity);
			}else{
				alert("Ingano mushaka kugurisha iruta iyo mufite.");
			}
		}else{
			alert("Ingano mushaka kugurisha iruta iyasabwe.");
		}
	});
});

function selling(cooperative,seller,variety,quantity,sold){
	$.post("selling_harvest",{
		cooperative:cooperative,
		seller:seller,
		variety:variety,
		last_quantity:quantity,
		quantity:sold,
	},function(data){
		alert(data);
	});
}
function sellingDiv(){
	$(".sellDiv").slideToggle();
	$(this).hide();
}