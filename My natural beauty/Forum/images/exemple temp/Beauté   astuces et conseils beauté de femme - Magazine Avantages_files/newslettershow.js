function verifForm(){
	
	var message = '';
	
	var errorMail = controlSendMailNL();
	if(errorMail){
		message += 'Votre adresse email n\'est pas valide\n<br/>';
	}
	

	var liste = ['29'];
	var nb_newsletter= 0;	
	for(var i=0;i<liste.length;i++){
		var newsletters = document.getElementById('newsletters'+liste[i]).checked;
		if(newsletters){
			nb_newsletter++;
		}
	}

	if(nb_newsletter == 0){
		message += 'Veuillez s&eacute;lectionner une newsletter\n<br/>';
	}

	if(message != ''){
		document.getElementById('erreur').innerHTML = message;
		return false;
	}else{
		return true;
	}
	
}


function controlSendMailNL() {

	var emailAddress=document.getElementById('emailAddress').value;
	var fromMailError=false;

	if(!emailAddress.match(/^[a-z0-9._-]+@[a-z0-9.-]{2,}[.][a-z]{2,3}$/)) {
		fromMailError = true;
	}

	return fromMailError;
}