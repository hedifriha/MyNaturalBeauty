function champsVide(){
	msg="";
	    if (window.document.centre.nom.value==""){
		msg+="champ NOM est vide \n";
		}	
		if (window.document.centre.region.value=="")
		{
		msg+="champ telephone est vide \n";
		}
		if (window.document.centre.adresse.value=="")
		{
		msg+="champ prenom est vide \n";
		}
		if (window.document.centre.site.value=="")
		{
		msg+="champ email est vide \n";
		}
		if (window.document.centre.remarque.value=="")
		{
		msg+="champ telephone est vide \n";
		}
		
	  if (!((window.document.form.mail.value.indexOf("@")>=0))|| !((window.document.centre.email.value.indexOf(".")>=0))) {
          msg+="Mail Non trouvé ! \n";
     }

		
		return msg;
	}
function telephone(){
	msg="";
	contenu=window.document.centre.numero.value;
	
	
		if  (isNaN(contenu)){
		msg+="caractere non numerique \n";		
		}
	if (contenu.length!=8)
	msg+= "Le numero doit etre etre compose de 8 chiffres \n";
	
	
 return msg;
	}
	
	
function validation(){
	
	x= champsVide();
	y= telephone();
	
if ((x=="") && (y=="")) {
 alert ("Le formulaire du centre est remplie :) ");
}
else alert(x+y);
	
	}		