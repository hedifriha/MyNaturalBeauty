<link type="text/css" rel="stylesheet" href="td.css" />
<link rel="stylesheet" href="styles.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="print.css" media="print" />
<?php
include("cnx.php");

seConnecter();

$idR=$_GET['id'];

$requete="delete from article where id='$idR'";
if(mysql_query($requete))
header("location:afficherArticlesupp.php");

else
echo"erreur de suppression";

?>