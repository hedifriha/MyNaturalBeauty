<html>
<head>
<style type="text/css">
      a.type1 { color: white; }
	  </style>
		
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/superfish.css" media="screen">
		<link href="css/camera.css" rel="stylesheet" type="text/css" media="all" />
		<script src="js/jquery.js"></script>
		<script src="js/superfish.js"></script>
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script> 
</head>
<body style>
<?php
include("cnxclient.php");
seConnecter();

if(isset($_GET['recherche']))
{
        $rec = htmlentities($_GET['recherche']);
}
else
{
        $rec = 'php MYSQL';
}

$mot= $_GET['id'];

$req = 'SELECT * FROM client WHERE id LIKE "%'.$mot.'%"';

$requete = mysql_query($req);
?>
<div class="wrap">
	<div class="header">
	<div class="logo">
	       <a href="produitclient.html">
		   <img src="images/logof.png" width="2000px" height="150 px">
		   </div>
	<div class="top-social-icons">
	<ul>
	<li>
	<a class="icon1" href="https://www.facebook.com/pages/My-Natural-Beauty/1441957062708617?ref=ts&fref=ts"></a>
	</li>
	<li>
	<a class="icon2" href="https://twitter.com/MyN_Beauty"></a>
	</li>
	<li>
	<a class="icon3" href="#"></a>
	</li>
	<li>
	<a class="icon4" href="" target="_blank"></a>
	</li>
	</ul>
	</div>
	</div>
	
	<div class="clear"></div>
	<div class="top-nav">
	<ul class="sf-menu sf-menu2 sf-js-enabled sf-arrous" id="example">
	     <li class="current home">
		 <a href="produitclient.html"></a>
		 </li>
	     <li>
		 <a href="ajouterclient.html" class="type1">Ajouter</a>
		 </li>
		<li>
		<a href="afficherclient.php" class="type1">Afficher</a>
		</li>
		<li>
		<a href="modifierclient.php" class="type1">Modifier</a>
		</li>
		<li>
		<a href="supprimerclient.php" class="type1">Supprimer</a>
		</li>
		<li>
		<a href="javascript:self.print()" class="type1">Imprimer </a>
		</li>
		<div class="clear"></div>
		</ul>
		<div class="clear"></div>
		</div>
		</div>
		<fieldset>
	<div class="hajer">
<table border="1">
	<tr>
		<td> &nbsp  &nbsp  &nbsp  &nbsp  &nbsp &nbsp  &nbsp &nbsp <font color="#808080">id </font></td>
		<td><font color="#808080"> nom </font></td>
		<td><font color="#808080"> prenom </font></td>
		<td><font color="#808080"> email </font></td>
		<td><font color="#808080">date </font></td>
		<td><font color="#808080"> remarque </font></td>
</tr>
<?php
//On affiche les resultats
while($ligne=mysql_fetch_array($requete))
{
	if($ligne=="")
	{
		echo "Ce nom n'existe pas";
	}
	
	else
	{
?>
    <tr>
		<td>&nbsp  &nbsp  &nbsp  &nbsp  &nbsp &nbsp  &nbsp &nbsp <font color="#808080"><?php echo $ligne['id']; ?></font> </td>
		<td><font color="#808080"> <?php echo $ligne['nom']; ?> </font></td>
		<td><font color="#808080"> <?php echo $ligne['prenom']; ?> </font></td>
		<td> <font color="#808080"><?php echo $ligne['email']; ?></font> </td>
		<td> <font color="#808080"><?php echo $ligne['date']; ?> </font></td>
		<td> <font color="#808080"><?php echo $ligne['remarque']; ?></font> </td>
		</tr>
<?php
	}
}
?>
</table>
</fieldset>
<div class="footer">
	<div class="wrap">
	<div class="footer-left">
	<a href="file:///C:/wamp/www/web/index.html">My Natural Beauty </a>
	</div>
	<div class="footer-right">
	<p>
	cr&ecirc;e par
	<a href="http://wa3layouts.com/">Shine</a>
	</p>
	<a href="#" id="toTop" style="display:block;">
	<span id="toTopHover"style="opacity:0;">
	<span id="toTopHover"style="opacity:1;">
	</span>
	</a>
</div>
<div class="clear"></div>
</div>
</div>	
</div>	
</body>
</html>