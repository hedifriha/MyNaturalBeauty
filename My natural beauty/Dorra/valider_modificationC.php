<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/superfish.css" media="screen">
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
  

<?php
include("cnx.php");
seConnecter();

$idr=$_POST['id'];
$nomR=$_POST['nom'];
$regionR=$_POST['region'];
$adresseR=$_POST['adresse'];
$siteR= $_POST['site'];
$mailR=$_POST['mail'];
$numeroR=$_POST['numero'];
$remarqueR=$_POST['remarque'];


//préparataion (dans une variable) de la requête SQL
$requete="UPDATE `centre` SET`nom`='$nomR', `region`='$regionR',`adresse`='$adresseR', `site`='$siteR',`mail`='$mailR',`numero`='$numeroR',`remarque`='$remarqueR' WHERE id='$idr'; ";

// la fonction mysql_query permet d'exécuter la requête préparée
if (mysql_query($requete))
header ("location:afficherC.php");
else
	 echo "insertion KO";
?>
</body>
</html>

<html> 
<head> 
</br></br>
  </br></br></br></br>
  </br></br></br></br>
  
<!---start-footer-->
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