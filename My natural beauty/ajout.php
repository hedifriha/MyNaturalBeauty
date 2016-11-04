<html>
<head>
<script language="javascript" type="text/javascript" src="controle.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>

<?php
include("connexion.php");
seConnecter();

//récupération des valeurs saisies par l'utilisateur et envoyée par "personne.html
$nomR=$_POST['nom'];
$prenomR=$_POST['prenom'];
$pseudoR=$_POST['pseudo'];
$emailR=$_POST['email'];
$sexeR= $_POST['sexe'];
$paysR=$_POST['pays'];
$ageR=$_POST['age'];
$passwordR=$_POST['password'];

//préparataion (dans une variable) de la requête SQL
$requete="insert into util (id,nom,prenom,pseudo,email,sexe,pays,age,password) values ('','$nomR', '$prenomR', '$pseudoR', '$emailR', '$sexeR', '$paysR', '$ageR','$passwordR'); ";

// la fonction mysql_query permet d'exécuter la requête préparée
if (mysql_query($requete))
header ("location:inscription.html");
else
	 echo "insertion KO";

?>
</body>
</html>