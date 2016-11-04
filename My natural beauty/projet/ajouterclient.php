<?php
/*récuperer les infos*/
  $idRecupere=$_GET['id'];
  $nomRecupere=$_GET['nom'];
  $prenomRecupere=$_GET['prenom'];
  $mailRecupere=$_GET['email'];
  $dateRecupere=$_GET['date'];
  $remarqueRecupere=$_GET['remarque'];

/*connexion*/
  include("cnxclient.php");
  seConnecter();
  $requete="INSERT INTO `projet`.`client` (`id`, `nom`, `prenom`, `email`, `date`, `remarque`) VALUES ('$idRecupere', '$nomRecupere', '$prenomRecupere', '$mailRecupere', '$dateRecupere', '$remarqueRecupere');";
  mysql_query($requete);
  if( $idRecupere=="" || $nomRecupere=="" || $prenomRecupere=="" || $mailRecupere=="" || $dateRecupere=="" || $remarqueRecupere=="")
     {
	header("location:ajouterclient.html");
     }
else
    {
	echo "Les donnees sont ajoutees avec succsse";
    }
?>