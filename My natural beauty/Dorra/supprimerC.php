<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Natural Beauty</title>
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
  


    <br></br>
    <br></br>
    <br></br>
  </br></br>
  </br></br>

    
    <?php
include("C:\wamp\www\My natural beauty\connexion.php");
seConnecter();
//preparation de la requete
$requete=" select * from centre ";

//récupération d'un flux provenant de la base de donnée (sous format d'une matrice)
$resultat =mysql_query($requete);

?>
    <form name="form" method="post" action="supprimerC.php">
  <table width="1000" border="1">	
  <tr>
    <td><strong>Id</strong></td>
    <td><strong>Nom</strong></td>
    <td><strong>Region</strong></td>
	  <td><strong>Adresse</strong></td>
    <td><strong>Email</strong></td>
    <td><strong>Site</strong></td>
    <td><strong>Numero</strong></td>
    <td><strong>Remarque</strong></td>
    <td><strong>Supprimer</strong></td>
    </tr>
  
  <?php //commentaire : la ligne <tr> est dynamique, elle doit être ajoutée chaque fois qu'il ya un enregistrement dans la base de données , il faut l'insérer dans une boucle "While"?>
  <?php while ($data= mysql_fetch_array($resultat)) {  ?>
<tr>
    <td> <?php  echo $data['id']; // récupération des données de la base de données?></td>
    <td><?php echo $data['nom'];?></td>
    <td><?php echo $data['region'];?></td>
	 <td><?php echo $data['adresse'];?></td>
    <td><?php echo $data['mail'];?></td>
    <td><?php echo $data['site'];?></td>
    <td><?php echo $data['numero'];?></td>
    <td><?php echo $data['remarque'];?></td>
    <td><a href="suppressionC.php?id=<?php  echo $data['id'];?>"> supp </a></td>
    </tr>
  <?php } // fermeture de la boucle while?>
</table>
</form>
    
     </div>
    <div id="footer">  </div>

</div>
</body>
</html>

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
