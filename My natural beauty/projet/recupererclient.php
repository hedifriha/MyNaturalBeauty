<html>
<head>
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
</head>
<body>
<?php
include("cnxclient.php");
seConnecter();

$requete="select * from client";
$resultat=mysql_query($requete);

$idR=$_POST['id'];
$requete2="select * from client where id='$idR'";
$resultat2=mysql_query($requete2);
?>
 <div class="wrap">
	<div class="header">
	<div class="logo">
	       <a href="produitclient.html">
		   <img src="images/logof.png" width="200px" height="150 px">
		   </div>
	<div class="top-social-icons">
	<ul>
	<li>
	<a class="icon1" href="https://www.facebook.com/pages/My-Natural-Beauty/1441957062708617?ref=ts&fref=ts"></a>
	</li>
	<li>
	<a class="icon2" href="#"></a>
	</li>
	<li>
	<a class="icon3" href="#"></a>
	</li>
	<li>
	<a class="icon4" href="#"></a>
	</li>
	</ul>
	</div>
	</div>
	
	<div class="clear"></div>
	<div class="top-nav">
	<ul class="sf-menu sf-menu2 sf-js-enabled sf-arrous" id="example">
	     <li class="current home">
		 <a href="produitclient.html"></a>
		 </li>
			<li><a href="ajouterclient.html" class="type1">&nbsp Ajouter</a></li>
			<li><a href="afficherclient.php" class="type1">&nbsp Afficher</a> </li>
			<li><a href="modifierclient.php" class="type1"> &nbsp Modifier</a> </li>
		    <li><a href="supprimerclient.php"class="type1">&nbsp Supprimer</a> </li>
			<li>
			<a href="javascript:self.print()" class="type1">Imprimer </a>
			</li>
			<li>
			<a href="http://www.conv2pdf.com/" class="type1">PDF</a>
			</li>
			<div class="clear"></div>
			</ul>
			<div class="clear"></div>
			</div>
			</div>
		
	
		<br></br>	
	    <br></br>
<div class="enfin">
 <img src="images/rima.png"/>
 </div>	
<fieldset>

<form id="formulaire" method="post" action="modificationclient.php">
<?php while($ligne=mysql_fetch_array($resultat2)) { ?>
<div class="hajer">
	<input type="hidden" name="id" value="<?php echo $ligne['id']; ?>" /> </br></br>
	nom: <input type="text" name="nom" value="<?php echo $ligne['nom']; ?>" /> </br></br>
	prenom: <input type="text" name="prenom" value="<?php echo $ligne['prenom']; ?>" /> </br></br>
	email: <input type="text" name="email" value="<?php echo $ligne['email']; ?>" /> </br></br>
	date: <input type="text" name="date" value="<?php echo $ligne['date']; ?>" /> </br></br>
	remarque: <input type="text" name="remarque" value="<?php echo $ligne['remarque']; ?>" /> </br></br>
</div>
<?php } ?>
<input type="submit" value="Modifier" />
</form>	
</body>
</html>	