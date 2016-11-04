<!DOCTYPE HTML>
<html>
<meta charset="utf-8">
	<head>
	<style type="text/css">
      a.type1 { color: white; }
	  </style>
		<title>rechercheCheveux2</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/superfish.css" media="screen">
		<link href="css/camera.css" rel="stylesheet" type="text/css" media="all" />
		<script src="js/jquery.js"></script>
		<script src="js/superfish.js"></script>
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script>
		(function($){ //create closure so we can safely use $ as alias for jQuery
			$(document).ready(function(){
				// initialise plugin
				var example = $('#example').superfish({
					//add options here if required
				});
				// buttons to demonstrate Superfish's public methods
				$('.destroy').on('click', function(){
					example.superfish('destroy');
				});
				$('.init').on('click', function(){
					example.superfish();
				});
				$('.open').on('click', function(){
					example.children('li:first').superfish('show');
				});
				$('.close').on('click', function(){
					example.children('li:first').superfish('hide');
				});
			});
		})(jQuery);
		</script>
		<script>
		jQuery(function(){
			jQuery('#camera_wrap_1').camera({
				height: '500',
				pagination: false,
				thumbnails: false,
				imagePath: '../images/'
			});

		});
	</script>
	</head>
	<body>
		<!---start-wrap---->
		<div class="wrap">
			<!---start-header---->
			<div class="header">
				<div class="logo">
					<a href="indexfront.html"><img src="images/logo.png" width="300px" height="150px" title="naturex" /></a>
				</div>
				<div class="top-social-icons">
					<ul>
						<li><a class="icon1" href="https://www.facebook.com/pages/My-Natural-Beauty/1441957062708617?fref=ts"target="_blank"> </a></li>
						<li><a class="icon2" href="#"> </a></li>
						<li><a class="icon3" href="#"> </a></li>
						<li><a class="icon4" href="#"> </a></li>
						<li><a class="connect" href="log.html" ></a></li>

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
							<a href="index.html" target="_blank"></a>
						</li>
						<li class="active">
							<a href="about.html" target="_blank">A-Propos</a>
						</li>
						<li>
							<a href="afficherFront2.html" target="_blank"> Articles</a>
						
						</li>
						<li>
							<a href="produitp.html" target="_blank">Produits</a>
						</li>
						
						<li>
							<a href="centre.html" target="_blank">Centres</a>
						</li>
						<li>
							<a href="Forum/indexforum.php" target="_blank">Forum</a>
						</li>
						
						<li>
							<a href="inscription.html" target="_blank">Inscription</a>
						</li>
						<div class="clear"> </div>
					</ul>
					</div>
					<div class="clear"> </div>
				</div>
<?php
include("connexion.php");

seConnecter();


/*$cheveux=$_POST['type'];*/

$requete="select * from article where type='cheveux'";
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

