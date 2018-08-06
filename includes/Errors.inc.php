<?php 

class Errors{

	################### MESSAGE STATE ################################
	public function forbiddenError(){
		return '500';
	}
	public function successState(){
		return '200';
	}
	public function systemError(){
		return '403';
	}

	public function existError(){
		return "Igihingwa ushaka gushyiramo gisanzwe kirimo";
	}
	################### END OF MESSAGE STATE #########################
	public function phone_error(){
		return "Mwashyizemo nimero ya telefoni nabi nimero igomba kuba imeze nkiyi:0788654323";
	}
	public function coop_name_error(){
		return "Izina rya koperative mwarishyizemo nabi";
	}
	public function pass_error(){
		return "Ijambo ry'ibanga rigomba kugira inyuguti 6 cyangwa hejuru yazo.";
	}
	#################### EMPTY DATASET ###################################
	public function no_crops(){
		return 'Ntabihingwa ino koperative ifite ushobora kwandika igihingwa ukanze hejuru ahanditse "shyiramo igihingwa".';
	}
	public function no_price(){
		return 'Nta biciro bya koperative bihari ushobora kwandika ibiciro ukanze hejuru ahanditse andika igiciro';
	}
	################### END OF EMPTY DATASET ###########################
	################# MODAL TEXT ##################################
	public function save_crop_title(){
		return 'Andika igihingwa gishya';
	}
	public function crop_name(){
		return 'Hitamo igihingwa';
	}
	public function crop_grades(){
		return 'Hitamo ubwoko bw igihingwa'; 
	}
	public function crop_save_button(){
		return 'ANDIKA IGIHINWA CYA KOPERATIVE';
	}

	########### PRICING MODAL TEXT ############################
	public function pricing_modal_title(){
		return 'Andika Igiciro cya koperative';
	}
	public function pricing_crop_variety(){
		return "HItamo category y'umusaruro";
	}
	public function pricing_input(){
		return "Shyiramo igiciro muri RWF";
	}
	public function price_save_button(){
		return 'ANDIKA IGICIRO CYA KOPERATIVE';
	}
	########### END OF PRICING MODAL  ##################
	########### HARVEST ##################################
	public function harvest_modal_title(){
		return "Andika umusaruro wa koperative";
	}
	public function input_member(){
		return "Hitamo umunyamuryango uzanye umusaruro";
	}
	public function input_member_harvest(){
		return "Shyiramo umusaruro asigaranye";
	}
	public function input_cooperative_harvest(){
		return "Shyiramo umusaruro azanye muri koperative";
	}
	public function save_cooperative_harvest_btn(){
		return "BIKA UMUSARURO WA KOPERATIVE";
	}
	#################### TABLE HEADERS TEXT ########################
	public function crop_variety_header(){
		return "Ubuziranenge";
	}
	public function price_header(){
		return 'Igiciro';
	}


################ COOPERATIVE LAND MESSAGE SECTION ###################
	public function land_header_message(){
		return 'Ubutaka bwa koperative muri Ares.';
	}
	public function no_land_message(){
		return "Ntabutaka ino koperative ifite ushobora kwandika ubutaka ukanze hejuru.";
	}
	public function add_land_modal(){
		return 'Andika ubutaka bushya.';
	}
	public function add_land_button(){
		return "Andika ubutaka.";
	}
	public function total_land_message(){
		return 'Ubutaka rusange bwa koperative muri <em>Ares</em>';
	}
	public function members_land_message(){
		return "Ubutaka bw' abanyamuryango";
	}
	public function cooperative_land_message(){
		return "Ubutaka bwa koperative";
	}

	public function modal_member_text(){
		return 'Hitamo umunyamuryango.';
	}
	public function member_land_text(){
		return "Shyiramo Ingano muri Ares y'ubutaka bw' umunyamuryango";
	}
	public function cooperative_land_text(){
		return "Shyiramo Ingano muri Ares y'ubutaka bwa koperative";
	}
	public function land_save_button(){
		return "BIKA UBUTAKA";
	}
	public function td_member(){
		return "Umunyamuryango";
	}
	public function td_member_land(){
		return "Ubutaka bw' umunyamuryango";
	}
	public function td_cooperative_land(){
		return "Ubutaka bwa koperative";
	}
	######################## END OF COOPERATIVE LAND ##################
	####################### COOPERATIVE FERTILIZERS ###################
	public function fertilizer_header(){
		return "Ifumbire ya koperative";
	}
	public function pesticide_header(){
		return "Imiti ya koperative";
	}
	public function view_fertilizer_header(){
		return "Reba abahawe n' abatarahabwa ifumbire.";
	}
	public function total_fertilizers_message(){
		return "Ingano y' ifumbire yose ya koperative";
	}
	public function total_pesticides(){
		return "Ingano y' imiti yose ya koperative";
	}
	public function total_received_fertilizer(){
		return "Abanyamuryango bahawe iyi fumbire";
	}
	public function btn_add_fertilizer(){
		return "Andika Ifumbire";
	}
	public function btn_add_pesticide(){
		return "Andika Imiti";
	}
	public function fertilizer_select_text(){
		return "Hitamo ubwoko bw' ifumbire.";
	}
	public function pesticide_select_text(){
		return "Hitamo ubwoko bw' ifumbire.";
	}
	public function add_fertilizer_modal(){
		return "Andika ifumbire ya koperative.";
	}
	public function add_pesticide_modal(){
		return "Andika Imiti ya koperative.";
	}
	public function fertilizer_quantity_text(){
		return "Shyiramo Ingano y' ifumbire.";
	}
	public function pesticide_quantity_text(){
		return "Shyiramo Ingano y' imiti.";
	}
	public function save_fertilizer_btn(){
		return "BIKA IFUMBIRE";
	}
	public function save_pesticide_btn(){
		return "BIKA IMITI";
	}
	public function no_fertilizer_message(){
		return "Ntafumbire ino koperative ifite ushobora guhyiramo ifumbire ukanze hejuru.";
	}
	public function fertilizer_name(){
		return "Ifumbire";
	}
	public function pesticide_name(){
		return "Umuti";
	}
	public function fertilizer_quantity(){
		return "Ingano rusange muri Kg";
	}
	public function fertilizer_remaining_quantity(){
		return "Ingano koperative Isigaranye";
	}
	public function remaining_fertilizers(){
		return "Ingano koperative Isigaranye";
	}
	public function fertilizer_members_quantity(){
		return "Ingano ifitwe n' abanyamuryango";
	}
	public function members_pesticide(){
		return "Ingano ifitwe n' abanyamuryango";
	}
	#################################### VIEW FERTILIZER ######################
	public function memberWithFertilizer(){
		return "Reba abanyamuryango bahawe ifumbire";
	}
	public function memberWithPesticide(){
		return "Abanyamuryango bahawe umuti";
	}
	public function memberWithNoFertilizer(){
		return "Abanyamuryango batahawe ifumbire";
	}
	public function memberWithNoPesticide(){
		return "Abanyamuryango batahawe umuti";
	}
	############################## VIEW HARVEST ##################################
	public function crops_grades(){
		return "ubwoko bw' igihingwa";
	}
	public function grade_varieties(){
		return "Ubuziranenge bw'ubwoko";
	}
	public function available_variety(){
		return "Ubuziranenge buhari";
	}

	############################# COOPERATIVE ORDERING ############################
	public function no_order(){
		return "Ntabusabe buraboneka muri kano kanya nihagira ububoneka tuzabamenyesha muri SMS.";
	}
	//########################### API ERROR SECTION #####################
	//////////////////// SUCCESS STATE MESSAGES ###################
	public function member_save_success(){
		return "Umunyamuryango yanditswe ntakibazo.";
	}
	public function member_removed_success(){
		return "Umunyamuryango twamukuyemo ntakibazo";
	}
	public function crop_save_success(){
		return "Igihingwa cyanditswe ntakibazo";
	}
	public function crop_removed_success(){
		return "Igihingwa cyavuyemo ntakibazo.";
	}
	//system error
	public function system_error_api(){
		return "Hari ikibazo muri system nimukomeza guhura niki kibazo mwahamagara abayishinzwe.";
	}
	public function cooperative_not_registered(){
		return "Iyi cooperative yabwo yandikishije";
	}
	public function member_name(){
		return "Izina ry' umunyamuryango rigomba kuba rigizwe n' inyuguti 3 kuzamura";
	}
	public function id_no_error(){
		return "Nomero y' irangamuntu igomba kuba itari munsi y'inyuguti 5";
	}
	public function member_phone_error(){
		return "Nomero ya Telefoni igomba imibare icumi";
	}
	public function member_gender_error(){
		return "Mugomba guhitamo igitsina";
	}
	public function dob_error(){
		return "Mugomba gushyiramo igihe yavukiye";
	}
	public function member_not_registered(){
		return "Uyu munyamuryango ntabwo ari muri iyi koperative";
	}

	public function crop_grade_error_api(){
		return "Ugomba guhitamo ubwoko buhari.";
	}
	public function crop_grade_empty(){
		return "Ugomba gushyiramo Ihingwa n' ubwoko";
	}
	public function crop_not_exist(){
		return "Igihingwa mushaka gusiba ntakirimo";
	}

	############################### API PRICING ###############################
	public function pricing_input_error(){
		return "Ntabwo Mwashyizemo amakuru yose akenewe";
	}
	public function variety_pricing_error(){
		return "Mugomba Gushyiramo Ubuziranenge n' igiciro.";
	}
	public function pricing_error(){
		return "Murebe niba amakuru yose mwayatanze. nimukomeza guhura nikibazo mwabaza abashinzwe ino sisiteme.";
	}
	public function pricing_saved_success(){
		return "Igiciro cyanditswe ntakibazo.";
	}
	public function pricing_404(){
		return "Ntagiciro cyabonetse";
	}
	public function pricing_removed(){
		return "Igiciro cyavuyemo ntakibazo";
	}
	############################### END API PRICING ###############################
	############################### API HARVEST ###############################
	public function crop_empty(){
		return "Shyiramo igihingwa.";
	}
	public function grade_empty(){
		return "Shyiramo ubwoko bw'igihingwa";
	}
	########################### END OF API HARVEST ###############################
	########################### COOPERATIVE LAND ################################
	public function member_cooperative_error(){
		return "Shyiramo umunyamuryango na koperative";
	}
	public function coop_member_land(){
		return "Shyiramo Ubutaka bwa koperative n' umunyamuryango";
	}
	public function land_saved_success(){
		return "Ubutaka bwa koperative bwanditswe ntakibazo.";
	}

	######################### END OF COOPERATIVE LAND ###########################

	####################### INSTUTIONAL COMMUNICATION ##########################
	public function messages_counter(){
		return "Ubutumwa bwose: ";
	}
	public function no_message(){
		return "Nta butumwa mufite muri kano kanya.";
	}
	public function no_comments(){
		return "Nta gitekerezo kiri kuri buno butumwa ba uwa mbere mu gutanga ibitekerezo.";
	}
	####################### END OF INSTITUTIONAL COMMUNICATIONM ################


}
$errors=new Errors();
?>