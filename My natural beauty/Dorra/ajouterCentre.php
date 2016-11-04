<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta charset="utf-8">
<head>
<script language="javascript" type="text/javascript" src="centre.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/superfish.css" media="screen">

<title>Document sans titre</title>
</head>

<body>
	<!---start-wrap---->
		<div class="wrap">
			<!---start-header---->
			<div class="header">
				<div class="logo">
					<a href="indexC.html"><img src="images/logo.png" width="300px" height="150px" title="My Natural Beauty" /></a>
				</div>
				<div class="top-social-icons">
					<ul>
						<li><a class="icon1" href="#"> </a></li>
						<li><a class="icon2" href="#"> </a></li>
						<li><a class="icon3" href="#"> </a></li>
						<li><a class="icon4" href="#"> </a></li>
						<li><a  href="login/logout.php" class="type1">se deconnecter </a></li>

					</ul>
				</div>
				<div class="clear"> </div>
			</div>
			<div class="clear"> </div>
			<!---End-header---->
			<!---start-top-nav---->
			<div class="top-nav">
						<ul class="sf-menu sf-menu2" id="example">
							<li  class="current home">
							<a href="indexC.html"></a>
						</li>
						<li class="active">
							<a href="centreC.html">Ajouter centre</a>
						</li>
						<li>
							<a href="afficherC.php"> Afficher centre</a>
						
						</li>
						<li>
							<a href="supprimerC.php">Supprimer Centre</a>
						</li>
						
						<li>
							<a href="modifierC.php">Modifier Centre</a>
						</li>
					
						
						<div class="clear"> </div>
					</ul>
					</div>
					<div class="clear"> </div>
				</div>
	


		<br></br>
		<br></br>
		<br></br>



<div id="innercontent">

<?php

include ("cnx.php");
seConnecter();


$nomRecupere=$_POST['nom'];
$regionRecupere=$_POST['region'];
$adresseRecupere=$_POST['adresse'];
$siteRecupere=$_POST['site'];
$mailRecupere=$_POST['mail'];
$numeroRecupere=$_POST['numero'];
$remarqueRecupere=$_POST['remarque'];
$image='images/centres/'.$_FILES['image']['name'];
move_uploaded_file($_FILES ['image'] ['tmp_name'],'images/centres/'.$_FILES['image']['name']);








$requete="INSERT INTO `projet`.`centre` (`id`, `nom`, `region`, `adresse`, `site`, `mail`, `numero`, `remarque`)  VALUES (NULL,'$nomRecupere','$regionRecupere','$adresseRecupere', '$siteRecupere', '$mailRecupere', '$numeroRecupere', '$remarqueRecupere');";
mysql_query($requete);


	
echo "Nom: ".$nomRecupere;
echo "</br>Region: ".$regionRecupere;
echo "</br>Adresse: ".$adresseRecupere;
echo "</br>Site: ".$siteRecupere;
echo "</br> E-mail: ".$mailRecupere;
echo "</br>Numero: ".$numeroRecupere;
echo "</br>Remarque: ".$remarqueRecupere;
echo "</br> <img src='".$image."'/>";


?>
</script>
	</div><!-- container -->
	<script type="text/javascript" src="js/fliplightbox.min.js"></script>
						<script type="text/javascript">$('body').flipLightBox()</script>
						<div class="clear"> </div>
				</div>
			</div>
			<!---End-about-->
			<!---End-content-->
		</div>
		<div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
		<!---start-footer-->
		<div class="footer">
			<div class="wrap">
				<div class="footer-left">
					<a href="index.html">NATURAL BEAUTY</a>
				</div>
				<div class="footer-right">
					<p>Créer par <a href="http://w3layouts.com/">Shine</a></p>
					<script type="text/javascript">
							$(document).ready(function() {
								/*
								var defaults = {
						  			containerID: 'toTop', // fading element id
									containerHoverID: 'toTopHover', // fading element hover id
									scrollSpeed: 1200,
									easingType: 'linear' 
						 		};
								*/
								
								$().UItoTop({ easingType: 'easeOutQuart' });
								
							});
						</script>
   					 <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
				</div>
				<div class="clear"> </div>
			</div>
		</div>
		<!---End-footer-->
		<!---End-wrap-->
		
	</body>
</html>
</div>