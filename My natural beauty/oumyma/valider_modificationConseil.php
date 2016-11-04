<link rel="stylesheet" href="styles.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="print.css" media="print" />


<?php

$idR=$_POST['id'];
$titreR=$_POST['titre'];
$contenuR=$_POST['contenu'];


include("cnx.php");

seConnecter();

$requete="update conseil set titre='$titreR' ,contenu='$contenuR' where id='$idR'";

mysql_query($requete);

?>