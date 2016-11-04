<html> 
<body bgcolor="#F5DEB3"> 
</body> 
</html> 
<?php

include("cnxproduit.php");
seConnecter();

$idR=$_POST['id'];
$requete="delete from produit where id='$idR'";
if(mysql_query($requete))
{
header("location:supprimerproduit.php");
}
else
echo "erreur de suppression";

?>