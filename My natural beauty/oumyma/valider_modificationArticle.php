<link rel="stylesheet" href="styles.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="print.css" media="print" />


<?php

$idR=$_POST['id'];
$nomR=$_POST['nom'];
$descriptionR=$_POST['description'];
$contenuR=$_POST['contenu'];
$remarqueR=$_POST['remarque'];
$typeR=$_POST['type'];

include("cnx.php");

seConnecter();

$requete="update article set nom='$nomR' , description='$descriptionR',contenu='$contenuR',remarque='$remarqueR',type='$typeR' where id='$idR'";

mysql_query($requete);

?>