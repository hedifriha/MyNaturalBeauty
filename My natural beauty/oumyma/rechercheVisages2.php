<!DOCTYPE HTML>
<html>
<meta charset="utf-8">
	<head>
		<title>Natural Beauty Template | About :: Shine</title>
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
						
						<!--<li><a  href="login/login.html" class="type1">se connecter </a></li> -->


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
							<a href="index.html"></a>
						</li>
						<li class="active">
							<a href="about.html">A-Propos</a>
						</li>
						<li>
							<a href="afficherFront2.html"> Articles</a>
						
						</li>
						<li>
							<a href="produit.html">Produits</a>
						</li>
						
						<li>
							<a href="centre.html">Centres</a>
						</li>
						<li>
							<a href="forum.html">Forum</a>
						</li>
						
						<li>
							<a href="contact.html">Contact</a>
						</li>	
						<div class="clear"> </div>
					</ul>
					</div>
					<div class="clear"> </div>
				</div>
				<!---End-header---->
			</div>
			
			
				
			
			
			
			
			
			
			
			
			
			
			
<?php
include("cnx.php");

seConnecter();


/*$typeR=$_POST['type'];*/

$requete="select * from article where type='visages'";
$resultat=mysql_query($requete);



?>

<?php while ($ligne=mysql_fetch_array($resultat)) { ?>
	<meta charset="utf-8">
	
		<div id="innercontentp">
			
		<div style width=4000px>
	<div id="innercontent">

	<B> <div id="ss">  &nbsp;  </B>  <?php echo $ligne['nom'];?> </div> 
	
	<B>  <p> <div id="pp">
					 &nbsp; </big> </B> <?php echo $ligne['description']; ?> <p> </div> 
	
	<B> <p> <div id="pp"> &nbsp; </big> </B> <?php echo $ligne['contenu']; ?> <p> </div> 
	
	<B> <p> <div id="pp"> &nbsp; </big> </B> <?php echo $ligne['remarque']; ?> <p> </div> 
	
	
	<B><p> <div id="pp"> &nbsp; </big> </B> <?php echo $ligne['type']; ?> <p> </div> 
	<br> </br></div>
	

</form>
	<div id="rightpart"> <B> <big>  &nbsp; </big> </B>  </br> <img src='<?php echo $ligne['imge'];	?>' /> </div>
		 <!--<td> <input type="radio" name="id" value="  ?>"/> </td>-->
		 <br> </br>
		  <br> </br>
		 


		  <br> </br>
		  <br> </br>
		  
		 <br> </br>
		  <br> </br>
		 </div>
		  </div></div></div>
<?php } ?>
 <html> 
<head> 
</br></br>
	</br></br></br></br>
	</br></br></br></br>
	<meta charset="utf-8">
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

