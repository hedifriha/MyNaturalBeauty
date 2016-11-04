<html>
<head>
<title>

    Rechercher un utilisateur

</title>
<style type="text/css">
      a.type1 { color: white; }
	  </style>
		
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/superfish.css" media="screen">
		<link href="css/camera.css" rel="stylesheet" type="text/css" media="all" />
		<script src="js/jquery.js"></script>
		<script src="js/superfish.js"></script>
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script> 
		<meta charset="utf8"/>
</head>
<body style>


<div class="wrap">
	<div class="header">
	
				<div class="contact">
					<div class="wrap">
					
				<div class="logo">
					<a href="index.html"><img src="images/logo.png" width="300px" height="150px" title="naturex" /></a>
				</div>
				</div></div></div>
	<div class="top-social-icons">
	<ul>
	
	
						<form action="login.php" method="post">
												<li><a  href="index.html"><input type="submit" class="type1" value="deconnexion"></input> </a></li><br/>
												<?php
session_start();

echo ' Bonjour '.$_SESSION[ 'pseudo'];

?>
						</form>
						
		
	

	</ul>
	</div>
	</div>
	
	<div class="clear"></div>
	<div class="top-nav">
	<ul class="sf-menu sf-menu2 sf-js-enabled sf-arrous" id="example">
	     <li class="current home">
		 <a href="indexback.html"></a>
		 </li>
	     
		<li>
		<a href="affiuser.php" class="type1">Afficher</a>
		</li>
		<li>
		<a href="modiuser.php" class="type1">Modifier</a>
		</li>
		<li>
		<a href="suppriuser.php" class="type1">Supprimer</a>
		</li>
		
		<li>
		<a href="javascript:self.print()" class="type1">Imprimer </a>
		</li>
		
	<li>	
<form id="form1" name="form1" method="post" action="recherche.php">
<input type="text" width="20px" name="rech" value=""  />
</form>
</li>

</li>
		<div class="clear"></div>
		</ul>
		<div class="clear"></div>
		</div>
		</div>
		 <?php
include("connexion.php");
seConnecter();

if (isset($_POST['rech'])){
$pseudoR=$_POST['rech'];
//preparation de la requete
$requete=" select * from util where pseudo='$pseudoR' ";

//récupération d'un flux provenant de la base de donnée (sous format d'une matrice)
$resultat =mysql_query($requete);

}
else {
$requete=" select * from util where pseudo='' ";
$resultat =mysql_query($requete);
}
?>
<div id="innercontent">

<?php   if (isset($_POST['rech'])) {?>
  <table class="hovertable">
<tr>
	<th>Id  personne</th><th>Nom</th><th>Prénom</th><th>Pseudo</th><th>Email</th><th>Sexe</th><th>Pays</th><th>Age</th><th>Password</th>
</tr>
  <?php } ?>
  <?php //commentaire : la ligne <tr> est dynamique, elle doit être ajoutée chaque fois qu'il ya un enregistrement dans la base de données , il faut l'insérer dans une boucle "While"?>
  <?php while ($data= mysql_fetch_array($resultat)) {  ?>
<tr>
    <td> <?php  echo $data['id']; // récupération des données de la base de données?></td>
    <td><?php echo $data['nom'];?></td>
    <td><?php echo $data['prenom'];?></td>
	<td><?php echo $data['pseudo'];?></td>
    <td><?php echo $data['email'];?></td>
    <td><?php echo $data['sexe'];?></td>
    <td><?php echo $data['pays'];?></td>
    <td><?php echo $data['age'];?></td>
	<td><?php echo $data['password'];?></td>
    </tr>
  <?php } // fermeture de la boucle while?>
</table>
    
     </div>
    <div id="footer"> </div>

</div>
</body>
</html>
