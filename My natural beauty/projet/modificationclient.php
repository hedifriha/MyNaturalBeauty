<?php
/*connexion et récupération des articles*/
 include("cnxclient.php");
 seConnecter();

$idR=$_POST['id'];
$nomRecupere=$_POST['nom'];
$prenomRecupere=$_POST['prenom'];
$emailRecupere=$_POST['email'];
$dateRecupere=$_POST['date'];
$remarqueRecupere=$_POST['remarque'];

$requete="UPDATE client SET  nom =  '$nomRecupere', prenom =  '$prenomRecupere', email='$emailRecupere', date='$dateRecupere',remarque='$remarqueRecupere' WHERE id ='$idR';";
mysql_query($requete);
if(mysql_query($requete))
{
header("location:modifierclient.php");
}
?>