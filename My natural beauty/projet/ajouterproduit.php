<?php
  /*récuper les infos */
  $idRecupere=$_POST['id'];
  $nomRecupere=$_POST['nom'];
  $dateRecupere=$_POST['date'];
  $noteRecupere=$_POST['note'];
  $remarqueRecupere=$_POST['remarque'];
  $image='images/produits/'.$_FILES['image']['name'];
  
  
 /*connexion*/
  include("cnxproduit.php");
  seConnecter();
  
  move_uploaded_file($_FILES['image']['tmp_name'],'images/produits/'.$_FILES['image']['name']);
  
  $requete="INSERT INTO `produit` (`id`, `nom`,`date`, `note`, `remarque`, `imge`) VALUES ('$idRecupere', '$nomRecupere', '$dateRecupere', '$noteRecupere', '$remarqueRecupere','$image');";
  if (mysql_query($requete)){
	header("location:afficherproduit.php");
  }
else
    {
		echo "Erreur Enregistrement Produit";
    }
 
?>
