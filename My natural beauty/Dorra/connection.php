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


</br></br>
  </br></br>



  <div id="innercontent">
    <fieldset >
      <legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Recherche </legend>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<form method="post" action="rechercheC.php">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label><input type="text" name="nom" id="nom" value="" placeholder="saisir le nom du centre" /> </label>*<br/>
     <br></br>
     
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit"  value="rechercher" /> 
    <br></br>
     
    <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*champs obligatoires</h6>
  


    </form>
</div>
  
<?php
include("cnx.php");
seConnecter();
$login="dorra";
$password="chaffai";

$logR=$_POST["login"];
$pwdR=$_POST["password"];

if(isset($_POST["login"])&& isset( $_POST["password"])){
  if($logR==$login && $pwdR==$password)
  {
    session_start();
    $_SESSION['l']=$logR;
	$_SESSION['p']=$pwdR;
	header('location:pagemembre.php');

}
else{
echo'<body onLoad="alert(\'membre non reconnu...\')">';
echo'<meta http-equiv="refresh"
content="0;URL=login.html">';
}
}
else{ 
echo "veuillez saisir votre login et votre password";
header('refresh:1; URL=login.html');
}




?>


</body>
</html>

<html> 
<head> 

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
    <!---End-footer-->
    <!---End-wrap---->
    
  </body>
</html>
