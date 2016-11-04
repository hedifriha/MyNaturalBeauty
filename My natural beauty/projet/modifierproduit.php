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
<!--affichafe sous forme d un tableau-->
<!--affichafe sous forme d un tableau-->
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
	<a class="icon4" href="https://twitter.com/MyN_Beauty"></a>
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
		 <a href="ajouterproduit.html" class="type1">Ajouter</a>
		 </li>
		<li>
		<a href="afficherproduit.php" class="type1">Afficher</a>
		</li>
		<li>
		<a href="modifierproduit.php" class="type1">Modifier</a>
		</li>
		<li>
		<a href="supprimerproduit.php" class="type1">Supprimer</a>
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
<form method="post" action="recupererproduit.php">
<table border="1"CELLPADDING="2" CELLSPACING="2" WIDTH="100%">
<tr>
        <td>&nbsp  &nbsp  &nbsp  &nbsp  &nbsp &nbsp  &nbsp &nbsp <font color="#808080">id </td></font>
		<td><font color="#808080"> nom </td></font>
		<td> <font color="#808080">date </td></font>
		<td> <font color="#808080">note </td></font>
		<td> <font color="#808080">remarque </td></font>
</tr>
<?php
include("cnxproduit.php");
  seConnecter();
$count=5;
$page=0;
if(isset($_GET['page'])){
$page=$_GET['page'];
}
else
{
$_GET['page']=$page;
}
$rowquery=mysql_fetch_array(mysql_query("select count(*) from produit"));
$rowcount=$rowquery[0];

$requete="select * from produit LIMIT ".$count." OFFSET ".($page*$count);


$resultat =mysql_query($requete) or die(mysql_error());

?>
  <?php while($ligne=mysql_fetch_array($resultat)) { ?>
  
    <tr>
		<td> &nbsp  &nbsp  &nbsp  &nbsp  &nbsp &nbsp  &nbsp &nbsp <font color="#808080"> <?php echo $ligne['id']; ?> </font></td>
		<td> <font color="#808080"> <?php echo $ligne['nom']; ?> </font></td>
		<td> <font color="#808080"> <?php echo $ligne['date']; ?> </font> </td>
		<td> <font color="#808080"> <?php echo $ligne['note']; ?> </font> </td>
		<td> <font color="#808080"> <?php echo $ligne['remarque']; ?> </font> </td>
		<td> <input type="radio" name="id" value="<?php echo $ligne['id']; ?>" /> </td>
	</tr>
	<?php } ?>
</table>

  
&nbsp  &nbsp  &nbsp  &nbsp  &nbsp &nbsp  &nbsp &nbsp <input type="submit" value="modifier" />
</form>
</fieldset>
<div class="pagination">
 <?php 
 if($page>0) echo "<a href=\"afficherproduit.php?page=".($page-1)."\"><img src=../images/left.png width=16px /></a> |";
 
 for($i=0;$i<$rowcount;$i+=$count){
	if($page==$i/$count) echo "<b>";
	echo "<a href=\"afficherproduit.php?page=".($i/$count)."\"> ".(($i/$count)+1)." </a> |";
	if($page==$i/$count) echo "</b>";
 }


  if($page<($rowcount/$count)-1) echo "<a href=\"afficherproduit.php?page=".($page+1)."\"><img src=../images/right.png width=16px /></a>"; 
   
   ?>
   </div>
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
	