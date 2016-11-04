function reinitializeInputs(flush) {

	document.getElementById('mailFromUser').style.backgroundColor='';
}

function handleError(errors) {

	for(var j=0; j < errors.length;j++) {
		switch(errors[j]) {
			case 1:
				document.getElementById('noSpam').style.backgroundColor='#FDD';
				break;

			case 2 :
				document.getElementById('mailFromUser').style.backgroundColor='#FDD';
				break;

		}
	}
}

function controlSendMail() {

	var mailFrom=document.getElementById('mailFromUser').value;
	var fromMailError=false;

	if(!mailFrom.match(/^[A-Za-z0-9._%+\-]+@[A-Za-z0-9.\-]+\.(?:[A-Za-z]{2}|com|org|net|gov|mil|biz|info|mobi|name|aero|jobs|museum)$/)) {
		return fromMailError;
	}

	return true;
}

function sendMailToFriendMDP() {

	var handler=new GC_Ajax(function() {
		if(h.readyState==4) {

			var code='var answerData='+h.responseText+';';
			//alert(h.responseText);
			eval(code);
			// alert(answerData.status);
			if(!answerData.status) {
			//alert(answerData);
				document.getElementById('sendMailPass').style.display='none';
				document.getElementById('sendMailPassError').style.display='block';
				switch(answerData.error){
					case 'inconnu':
						messageerreur = 'E-mail inconnu sur Famili.fr.' ;
					break;
					case 'mail':
						messageerreur = 'Le format de l\'e-mail est erron&eacute;.' ;
					break;
					case 'erreur':
						messageerreur = 'Une erreur a eu lieu veuillez r&eacute;essayez s\'il vous plait.' ;
					break;
					case 'rien':
						messageerreur = 'Une erreur a eu lieu veuillez r&eacute;essayez s\'il vous plait.	' ;
					break;
				}
				document.getElementById('sendMailPassErrorText').innerHTML = messageerreur;
				//handleError(answerData.error);
				return false;
			}
			else {
				//alert(answerData);
				var buffer = '<div><p style="margin-top:20px"> Un mail vous a &eacute;t&eacute; envoy&eacute; avec vos informations de connexion';

				buffer += '</p></div>';

				jQuery("#sendMailMotDePass").dialog('close');

				reinitializeInputs(true);

				var tempNode=document.createElement('div');
				tempNode.style.textAlign="left";
				tempNode.style.fontSize="0.7em";


				tempNode.innerHTML=buffer;
				jQuery(tempNode).dialog({
					modal: true,
					title:'<div id="img-mdp" class="left"><img class="left" src="/image/contenu/titre_mdp_oublie.png" alt="mot de passe oublié" title="mot de passe oublié" /></div>',
					resizable: false,
					draggable: false,
					dialogClass: "sendMailDialog",
					buttons: {
						'Ok': function() {
							jQuery(this).dialog('close');
						}
					}
				});
			}
			document.getElementById('sendMailPassError').style.display='block';
			document.getElementById('sendMailPass').style.display='none';
		}
	});

	var mailFrom=document.getElementById('mailFromUser').value;

	handler.addData('url', document.location);
	handler.addData('title', window.document.title);

	handler.addData('send', 'mail');
	handler.addData('emailAddress', mailFrom);
	var h=handler.init();
	reinitializeInputs();

	document.getElementById('sendMailPass').style.display='block';
	document.getElementById('sendMailSubmitButton').style.display='none';

	handler.sendQuery('/direct/membre/envoyermotdepasse');
}

jQuery(document).ready(function() {

	document.getElementById('sendMailSubmitButton').style.display='none';

	// document.getElementById('sendMailMotDePass').style.display='none';
	//alert(document.getElementById('sendMailMotDePass'));
	document.getElementById('motDePassPerdu').onsubmit =  function() {
					if(controlSendMail()) {
						sendMailToFriendMDP();
					}else{
							document.getElementById('sendMailPassError').style.display = 'block';
							document.getElementById('sendMailPassError').innerHTML = 'Veuillez indiquer un e-mail';
							document.getElementById('mailFromUser').value = '{ Votre adresse e-mail }';
					}
				};
	document.getElementById('mailFromUser').onclick = function(){
		var mailValue = document.getElementById('mailFromUser').value;
		if(mailValue == '{ Votre adresse e-mail }'){
			document.getElementById('mailFromUser').value ='';
			document.getElementById('sendMailPassError').style.display = 'none';
			document.getElementById('sendMailPassError').innerHTML = '';
		}
	};


	if (jQuery.ui){
		var object=jQuery("#sendMailMotDePass").dialog({
			title:'',
			autoOpen:false,
			bgiframe: true,
			modal: true,
			draggable: false,
			resizable: false,
			dialogClass: 'sendMailDialog',
			width:450,

			buttons: {
				Envoyer: function() {
					if(controlSendMail()) {
						sendMailToFriendMDP();
					}
				},
				Annuler: function() {
					jQuery(this).dialog('close');
				}
			}
		});
	}
});

function openSendPasswordPopup(emailAddress)
{
	if (emailAddress) {
		document.getElementById("mailFromUser").value = emailAddress;
	}
	jQuery("#sendMailMotDePass").dialog("open");
}