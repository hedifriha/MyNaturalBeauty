<link type="text/css" rel="stylesheet" href="td.css" />
<link rel="stylesheet" href="styles.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="print.css" media="print" />
<?php
include("connexion.php");

seConnecter();

$idR=$_GET['id'];

$requete="delete from conseil where id='$idR'";
if(mysql_query($requete))
header("location:afficherConseil.php");

else
echo"erreur de suppression";

?>