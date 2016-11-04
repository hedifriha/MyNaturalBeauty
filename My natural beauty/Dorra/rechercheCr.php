
<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/superfish.css" media="screen">
<?php
include("cnx.php");

seConnecter();


$nomR=$_POST['region'];

$requete="select * from centre where nom='$regionR'";
$resultat=mysql_query($requete);

?>


<!---start-wrap-->
		<div class="wrap">
			<!---start-header-->
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
						

					</ul>
				</div>
				<div class="clear"> </div>
			</div>
			<div class="clear"> </div>
			<!---End-header-->
			<!---start-top-nav-->
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
</table>
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
