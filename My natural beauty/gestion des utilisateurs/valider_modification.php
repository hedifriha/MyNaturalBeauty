<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<?php
include("connexion.php");
seConnecter();

//récupération des valeurs saisies par l'utilisateur et envoyée par "personne.html
$idr=$_POST['id'];
$nomR=$_POST['nom'];
$prenomR=$_POST['prenom'];
$pseudoR=$_POST['pseudo'];
$emailR=$_POST['email'];
$sexeR= $_POST['sexe'];
$paysR=$_POST['pays'];
$ageR=$_POST['age'];
$passwordR=$_POST['password'];


//préparataion (dans une variable) de la requête SQL
$requete="UPDATE `util` SET`nom`='$nomR',`prenom`='$prenomR',`pseudo`='$pseudoR',`email`='$emailR',`sexe`='$sexeR',`pays`='$paysR',`age`='$ageR' ,`password`='$passwordR' WHERE id='$idr'; ";

// la fonction mysql_query permet d'exécuter la requête préparée
if (mysql_query($requete))
header ("location:modiuser.php");
else
	 echo "insertion KO";

?>
</body>
</html>