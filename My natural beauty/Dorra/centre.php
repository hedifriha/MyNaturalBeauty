<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/superfish.css" media="screen">

<?php
include("cnx.php");

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
					<a href="indexC.html"><img src="images/logo.png" width="300px" height="150px" title="My Natural Beauty" /></a>
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
							<a href="about.html">A-Propos</a>
						</li>
						<li>
							<a href="gallery.html"> Articles</a>
						
						</li>
						<li>
							<a href="produit.html">Produits</a>
						</li>
						
						<li>
							<a href="centre.php">Centres</a>
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
	


		<br></br>
		<br></br>
		<br></br>

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