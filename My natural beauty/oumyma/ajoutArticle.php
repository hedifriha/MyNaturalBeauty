<html> 
<head> 

<meta charset="utf-8">
<title>Natural Beauty Template | About :: Shine</title>
<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/superfish.css" media="screen">
		<script src="js/jquery.js"></script>
		<script src="js/superfish.js"></script>
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
	</head>
	
	<body>

	<!---start-wrap---->
		<div class="wrap">
			<!---start-header---->
			<div class="header">
				<div class="logo">
					<a href="index.html"><img src="images/logo.png" width="300px" height="150px" title="naturex" /></a>
				</div>
				<div class="top-social-icons">
					<ul>
						<li><a class="icon1" href="https://www.facebook.com/pages/My-Natural-Beauty/1441957062708617?fref=ts"> </a></li>
						<li><a class="icon2" href="https://twitter.com/MyN_Beauty"> </a></li>
						<li><a class="icon3" href="https://plus.google.com/u/0/115857592855335052324/posts"> </a></li>
						<li><a class="icon4" href="http://instagram.com/mynaturalbeautygroup"> </a></li>
						
						<!--<li><a  href="login.html" class="type1">se connecter </a></li>-->


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
							<a href="indexArticle.html"></a>
						</li>
						<li class="active">
							<a href="article.html">Ajouter Article</a>
						</li>
						<li>
							<a href="afficherArticle.php"> Afficher</a>
						
						</li>
						<li>
							<a href="AfficherArticlemodiff.php">Modifier</a>
						</li>
						
						<li>
							<a href="afficherArticlesupp.php">Supprimer</a>
						</li>
						<li>
							<a href="indexArticle.html">Chercher</a>
						</li>
						
						
						<div class="clear"> </div>
					</ul>
					</div>
					<div class="clear"> </div>
				</div>
				<!---End-header---->
			</div>
	</br></br>
	</br></br>
		
	</body>
</html>
<div id="innercontent">
<?php

include ("cnx.php");
seConnecter();
?>
 <div id="ss"> 
<?php 
$nomRecupere=$_POST['nom']; ?> </div>
<div id="pp"> <?php
$descriptionRecupere=$_POST['description'];

$contenuRecupere=$_POST['contenu'];
$remarqueRecupere=$_POST['remarque'];
$typeRecupere=$_POST['type'];
$image='images/produits/'.$_FILES['image']['name'];
move_uploaded_file($_FILES ['image'] ['tmp_name'],'images/produits/'.$_FILES['image']['name']);


$requete="INSERT INTO `article` (`id`, `nom`, `description`, `contenu`, `remarque`, `type`,`imge`)  VALUES (NULL,'$nomRecupere','$descriptionRecupere','$contenuRecupere','$remarqueRecupere','$typeRecupere', '$image');";
mysql_query($requete);

echo "".$nomRecupere;
echo "</br>la description de l'article est: ".$descriptionRecupere;
echo "</br>le contenu de l'article est: ".$contenuRecupere;
echo "</br>votre remarque est: ".$remarqueRecupere;
echo "</br>Type: ".$typeRecupere;
echo "</br> <img src='".$image."'/>";
?>
</div>

<html> 
<head> 
</br></br>
	</br></br></br></br>
	</br></br></br></br>
	
<!---start-footer----->
		<div class="footer">
			<div class="wrap">
				<div class="footer-left">
					<a href="index.html">NATURAL BEAUTY</a>
				</div>
				<div class="footer-right">
					<p>Crée par <a href="http://w3layouts.com/">Shine</a></p>
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
		<!---End-footer----->
		<!---End-wrap---->
		
	</body>
</html>