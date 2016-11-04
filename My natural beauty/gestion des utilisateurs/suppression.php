
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<?php
include("connexion.php");
seConnecter();

$idr=$_GET['id'];

$requete="delete from util where id='$idr';";
if (mysql_query($requete))
header("location:suppriuser.php");

?>
</body>
</html>