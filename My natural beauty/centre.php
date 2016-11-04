
<!DOCTYPE HTML>
<html>
<meta charset="utf-8">
	<head>
	<style type="text/css">
      a.type1 { color: white; }
	  </style>
		<title>centre</title>
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
					<a href="index.html"><img src="images/logo.png" width="300px" height="100px" title="My Natural Beauty" /></a>
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
							<a href="centre.php" target="_blank">Centres</a>
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
$requete="select * from centre";
$resultat=mysql_query($requete);


?>
<body id="tout">

		<div id="innercontent">
		<fieldset >
      <legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <div id="it">Chercher un centre </div> </legend>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<form method="post" action="rechercheC.php">
	    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label><input type="text" name="nom" id="nom" value="" placeholder="saisir le nom du centre" /> </label>
		  
		  <input type="submit"  value="rechercher" /> 
		 
	  </form>

	  <br></br>
		

       <form method="post" action="rechercheCr.php">
	   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label><input type="text" name="region" id="region" value="" placeholder="saisir la region du centre" /> </label>
		 <input type="submit"  value="rechercher" /> 
		<br></br>
		</form>

</div>

	
	</br></br>
	</br></br>

<?php while ($ligne=mysql_fetch_array($resultat)) { ?>

	<div id="innercontentp">

	<div id="innercontent">
      <div class="ss">
					
						
	    <?php echo $ligne['nom']; ?> 
	 </div>
	</br></br>
	 <div id="it">
		 &nbsp;&nbsp;&nbsp;&nbsp;Region: &nbsp;&nbsp;<?php echo $ligne['region']; ?> 
		 </br></br>
		 &nbsp;&nbsp;&nbsp;&nbsp;Adresse: &nbsp;&nbsp;<?php echo $ligne['adresse']; ?> 
		 </br></br>
		  &nbsp;&nbsp;&nbsp;&nbsp;Site: &nbsp;&nbsp;<?php echo $ligne['site']; ?> 
		  </br></br>
		 &nbsp;&nbsp;&nbsp;&nbsp;E-mail: &nbsp;&nbsp;<?php echo $ligne['mail']; ?> 
		 </br></br>
		 &nbsp;&nbsp;&nbsp;&nbsp;Numero: &nbsp;&nbsp;<?php echo $ligne['numero']; ?> 
		 </br></br>
		&nbsp;&nbsp;&nbsp;&nbsp;Remarque: &nbsp;&nbsp;<?php echo $ligne['remarque']; ?> 
	</div>	
		 

</form>
	<div id="rightpart"> <B> <big>  &nbsp; </big> </B>  </br> <img src='<?php echo $ligne['imge'];	?>' /> </div>
		 <!--<td> <input type="radio" name="id" value="  ?>"/> </td>-->
		 <br> </br>
		  <br> </br>
		 
		
		  </div></div></div>
<?php } ?>
</table>
</div>
</body>