<html> 
<body bgcolor="#F5DEB3"> 
</body> 
</html> 
<?php
include("cnxclient.php");
seConnecter();

$idR=$_POST['id'];
$requete="delete from client where id='$idR'";
if(mysql_query($requete))
{
header("location:supprimerclient.php");
}
else
echo "erreur de suppression";
?>