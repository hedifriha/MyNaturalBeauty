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

 
	  </form>
	  </div>
	</body>
</html>
<?php

$idR=$_GET['id'];
include("cnx.php");

seConnecter();


$requete="select * from article where id='$idR'";
$resultat=mysql_query($requete);
while ($ligne=mysql_fetch_array($resultat)){


?>
 <legend><B> 
	 <div id="ss"> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp;
	 &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp;Mon Article :  </div></legend> <br></br>
<form method="post" action="valider_modificationArticle.php">
 
    <input type="hidden" name="id" value="<?php echo $ligne ['id'];?>">
	

	
	     <p> <div id="pp"> 
		 &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp;
&nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; 
		  Nom:  <input type="text" name="nom" id="nom" value="<?php echo $ligne ['nom'];?>" /> </label></div>
		 <br></br>
		 
		 <p> <div id="pp"> 
		 &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp;
&nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; 
		 Description: <input type="text" name="description" id="description" value="<?php echo $ligne ['description'];?>"  /> </label></div>
		 <br></br>
		
		<td> <p> <div id="pp"> 
		 &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp;
&nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; 
		 Contenu:
		<td><textarea name="contenu" id="contenu" cols="45" rows="5"> <?php echo $ligne ['contenu'];?> </textarea></td></div>
		<br></br>
		
		<br></br>
		 <p> <div id="pp"> 
		 &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp;
&nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; 
		 Remarque: <textarea id="remarque" name="remarque" cols="45" rows="5" > <?php echo $ligne ['remarque'];?></textarea> </label> </div>
		<br></br>
		
		 <p> <div id="pp"> 
		 &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp;
&nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; 
		  Type: &nbsp; &nbsp; <input type="radio" name="type" id="type" value="cheveux" required/> Cheveux 
		 &nbsp; &nbsp; <input type="radio" name="type" id="type" value="corps" /> Corps
		 &nbsp; &nbsp; <input type="radio" name="type" id="type" value="main" /> Mains/Pieds 
	    &nbsp; &nbsp; <input type="radio" name="type" id="type" value="visages"  /> Visages  </div>
		<br></br>
		 <p> <div id="pp"> 
		 &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp;
&nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; 
		 
		 &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; 	
&nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; 	 
 	
		
			&nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; 	
		&nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; 	
		&nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; 	
		&nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp;
		<input type="submit" value="Valider modification" />

 
</form>
	
	<?php } ?>
	
	
	
	
<html> 
<head> 
</br></br>
	</br></br></br></br>
	</br></br>
	
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