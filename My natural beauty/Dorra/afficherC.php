<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/superfish.css" media="screen">

<?php
include("C:\wamp\www\My natural beauty\connexion.php");

seConnecter();
$requete="select * from centre";
$resultat=mysql_query($requete);


?>
<body id="tout">


<!---start-wrap---->
		<div class="wrap">
			<!---start-header---->
			<div class="header">
				<div class="logo">
					<a href="indexC.html"><img src="images/logo.png" width="300px" height="100px" /></a>
				</div>
				<div class="top-social-icons">
					<ul>
						<li><a class="icon1" href="https://www.facebook.com/pages/My-Natural-Beauty/1441957062708617?fref=ts"> </a></li>
						<li><a class="icon2" href="https://twitter.com/MyN_Beauty"> </a></li>
						<li><a class="icon3" href="https://plus.google.com/u/0/115857592855335052324/posts"> </a></li>
						<li><a class="icon4" href="http://instagram.com/mynaturalbeautygroup"> </a></li>
						

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
		<fieldset >
      <legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Chercher un centre </legend>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<form method="post" action="centre/rechercheC.php">
	    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label><input type="text" name="nom" id="nom" value="" placeholder="saisir le nom du centre" /> </label>
		  
		  <input type="submit"  value="rechercher" /> 
		 
	  </form>

	  <br></br>
		

       <form method="post" action="centre/rechercheCr.php">
	   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label><input type="text" name="region" id="region" value="" placeholder="saisir la region du centre" /> </label>
		 <input type="submit"  value="rechercher" /> 
		<br></br>
		</form>

</div>

	
	</br></br>
	</br></br>
	</br></br>
	</br></br>
	</br></br>
	</br></br>
	</br></br>
	

<?php while ($ligne=mysql_fetch_array($resultat)) { ?>

	<div id="innercontentp">

	<div id="innercontent">
      <div id="ss">
	    <?php echo $ligne['nom']; ?> 
	  </div>
	</br></br>
	 <div id="it">
		 <div id="gras" > &nbsp;&nbsp;&nbsp;&nbsp;Region: </div>&nbsp;&nbsp;<?php echo $ligne['region']; ?> 
		 <div id="gras" > &nbsp;&nbsp;&nbsp;&nbsp;Adresse: </div>&nbsp;&nbsp;<?php echo $ligne['adresse']; ?> 
		 <div id="gras" > &nbsp;&nbsp;&nbsp;&nbsp;Site: </div>&nbsp;&nbsp;<?php echo $ligne['site']; ?> 
		 <div id="gras" > &nbsp;&nbsp;&nbsp;&nbsp;E-mail: </div>&nbsp;&nbsp;<?php echo $ligne['mail']; ?> 
		 <div id="gras" > &nbsp;&nbsp;&nbsp;&nbsp;Numero: </div>&nbsp;&nbsp;<?php echo $ligne['numero']; ?> 
		 <div id="gras" > &nbsp;&nbsp;&nbsp;&nbsp;Remarque: </div>&nbsp;&nbsp;<?php echo $ligne['remarque']; ?> 
	</div>	
		 

</form>
	<div id="rightpart"> <B> <big>  &nbsp; </big> </B>  </br> <img src='<?php echo $ligne['imge'];	?>' /> </div>
		 <!--<td> <input type="radio" name="id" value="  ?>"/> </td>-->
		 <br> </br>
		  <br> </br>
		 
		
		  </div></div></div>
<?php } ?>
</div>
</body>