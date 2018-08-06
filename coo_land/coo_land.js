$(document).ready(function(){
	var frm_add_land=$("#frm_add_land");
	var member=$("#member");
	var member_land=$("#member_land");
	var coo_land=$("#coo_land");
	var cooperative=$("#cooperative");
	var btn_save_land=$("#btn_save_land");
	var status=false;
	var memberInfo="";
	var requestUrl="save_land";
	var data=[];
	var redirectUrl="land";
	//saveModal(requestUrl,data,redirectUrl);
	//domStatus(btn_save_land,member_land,coo_land,status);
	member.change(function(){
		memberInfo=$(this).val();
		if(memberInfo.length>0){
			domStatus(btn_save_land,member_land,coo_land,true);
		}else{
			domStatus(btn_save_land,member_land,coo_land,false);
		}
	});
	frm_add_land.submit(function(e){
		e.preventDefault();
		data[0]="save_land";
		data[1]=member.val();
		data[2]=cooperative.val();
		data[3]=member_land.val();
		data[4]=coo_land.val();

		saveModal(requestUrl,data,redirectUrl);

	});
});
function domStatus(btn_save_land,member_land,coo_land,status){
	if(status){
		btn_save_land.show();
		member_land.show();
		coo_land.show();
	}else{
		btn_save_land.hide();
		member_land.hide();
		coo_land.hide();
	}
}