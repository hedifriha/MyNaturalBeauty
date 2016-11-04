<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ModifierC</title>
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
  <br></br>
  <br></br>
  
    
    <?php
include("C:\wamp\www\My natural beauty\connexion.php");
seConnecter();
//preparation de la requete
$requete=" select * from centre ";

//récupération d'un flux provenant de la base de donnée (sous format d'une matrice)
$resultat =mysql_query($requete);

?>
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
    <td><strong>Modifier</strong></td>
    </tr>
  <?php //commentaire : la ligne <tr> est dynamique, elle doit être ajoutée chaque fois qu'il ya un enregistrement dans la base de données , il faut l'insérer dans une boucle "While"?>
  <?php while ($data= mysql_fetch_array($resultat)) {  ?>
<tr>
    <td> <?php  echo $data['id']; // récupération des données de la base de données?></td>
    <td><?php echo $data['nom'];?></td>
    <td><?php echo $data['region'];?></td>
	  <td><?php echo $data['adresse'];?></td>
    <td><?php echo $data['site'];?></td>
    <td><?php echo $data['mail'];?></td>
    <td><?php echo $data['numero'];?></td>
    <td><?php echo $data['remarque'];?></td>
    <td> <a href="ModifierC.php?id=<?php  echo $data['id']; ?>"> modif </a></td>
    </tr>
  <?php } // fermeture de la boucle while?>
</table>

</br></br>
  

<?php 
if (isset($_GET['id'])){

$idr=$_GET['id'];
$requete2="select * from centre where id='$idr'";
}
else $requete2="select * from centre where id='0'";

$resultat2=mysql_query($requete2);
while ($ligne=mysql_fetch_array($resultat2)){
 ?>
 <form id="form1" name="form1" method="post" action="valider_modificationC.php">
        <fieldset>
          <legend>Modifier ce centre</legend>
          <br></br>
          <br></br>
          <input type="hidden" name="id" value="<?php echo $ligne['id'];?>"  />
          <table width="400" border="0">
            <tr>
              <td width="80">Nom:</td>
              <td width="310"><input type="text" name="nom" id="nom" value="<?php echo $ligne['nom'];?>"/></td>
            </tr>
            <tr>
              <td>Region :</td>
              <td><input type="text" name="region" id="region" value="<?php echo $ligne['region'];?>"/></td>
            </tr>
            <tr>
              <td>Adresse :</td>
              <td><input type="text" name="adresse" id="adresse" value="<?php echo $ligne['adresse'];?>"/></td>
            </tr>
            <tr>

              <td>Site : </td>
              <td><input type="text" name="site" id="site" value="<?php echo $ligne['site'];?>" /></td>
            </tr>
            <tr>
              <td>Email : </td>
              <td><input type="text" name="mail" id="mail" value="<?php echo $ligne['mail'];?>" /></td>
            </tr>
            <tr>
              
              <td>Numero :</td>
              <td><input type="text" name="numero" id="numero" value="<?php echo $ligne['numero'];?>"/></td>
            </tr>
            <tr>

              <td>Remarque :</td>
              <td><input type="text" name="remarque" id="remarque" value="<?php echo $ligne['remarque'];?>"/></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input type="submit" name="button" id="button" value="Mettre à jour" />
              <input type="reset" name="button2" id="button2" value="Réinitialiser" /></td>
            </tr>
          </table>
          <p>&nbsp;</p>
        </fieldset>
      </form>
      <?php }  ?>
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
