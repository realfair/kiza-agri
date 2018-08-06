function load_districts(){
	return 'load_districts';
}

function save_setup(){
	return 'save_setup';
}
function register_cooperative(){
	return 'register_cooperative';
}

function cooperative_login(){
	return 'cooperative_login';
}
function forbiddenError(){
	return '500';
}

function successState(){
	return '200';
}

function systemError(){
	return '403';
}
function systemErrorMsg(){
	return 'Hari ikibazo muri sisiteme mwakwifashisha abashinzwe kuyikurikirana';
}
function existCropError(){
	return "Igihingwa ushaka gushyiramo gisanzwe kirimo";
}

function deleteCropMsg(){
	return "Murashaka koko gusiba kino gihingwa !";
}
function deleteSuccessMsg(){
	return "Byakozwe neza!";
}
//redirection and urls

function redirectTo(url){
	window.location=url;
}

//urls
function dashboard(){
	return 'dashboard';
}
//cooperative error section
function invalid_credentials(){
	return "Izina ryo kwinjira n'ijambo ry'i banga ntabwo aribyo nimukomeza guhura niki kibazo mwakwifashisha abashinzwe ino sisiteme";
}
function name_error(){
	return "Izina rya koperative rigomba kuva hejuru y'inyuguti 3";
}
function invalid_name(){
	return 'Mwashyizemo inyuguti zitemewe mu izina rya koperative';
}
function invalid_phone(){
	return 'Telefoni ya koperative Mwashyizemo nabi';
}
function invalid_province(){
	return 'Hitamo intara muherereyemo';
}
function invalid_district(){
	return 'Hitamo akarere muherereyemo';
}
function invalid_president_name(){
	return 'Amazina ya Perezida wa koperative arakenewe';
}
function invalid_password(){
	return "Ijambo ry' ibanga rigomba kuba inyuguti 6 kuzamura";
}
function unmatch_password(){
	return "Ijambo ry'ibanga Mwashyizemo ntirihuye hose";
}