
<?php
/* récuper les infos et connexion*/
 include("cnxproduit.php");
 seConnecter();

$idR=$_POST['id'];
$nomRecupere=$_POST['nom'];
$dateRecupere=$_POST['date'];
$noteRecupere=$_POST['note'];
$remarqueRecupere=$_POST['remarque'];

$requete="UPDATE  produit SET  nom =  '$nomRecupere', date =  '$dateRecupere', note='$noteRecupere', remarque='$remarqueRecupere' WHERE id ='$idR';";

mysql_query($requete);
if(mysql_query($requete))
{
header("location:modifier.php");
}

?>