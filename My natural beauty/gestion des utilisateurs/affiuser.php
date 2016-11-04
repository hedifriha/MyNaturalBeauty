<?php
session_start();
if(isset($_SESSION['login']))
{
?>
<html>
<head>
<style type="text/css">
      a.type1 { color: white; }
	  </style>
		
		<link href="../css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="../css/superfish.css" media="screen">
		<link href="../css/camera.css" rel="stylesheet" type="text/css" media="all" />
		<script src="../js/jquery.js"></script>
		<script src="../js/superfish.js"></script>
		<script type="../text/javascript" src="js/move-top.js"></script>
		<script type="../text/javascript" src="js/easing.js"></script> 
		<meta charset="utf8"/>
</head>
<body style>


<div class="wrap">
	<div class="header">
	
					<div class="wrap">
					
				<div class="logo">
					<a href="index.html"><img src="../images/logo.png" width="300px" height="150px" title="naturex" /></a>
				</div>
				</div></div></div>
	<div class="top-social-icons">
		<ul>
	
	<li><a  href="logout.php" class="deconnect"> </a></li>
	<br/>
	
	</ul>
	</ul>
	</div>
	</div>
	
	<div class="clear"></div>
	<div class="top-nav">
	<ul class="sf-menu sf-menu2 sf-js-enabled sf-arrous" id="example">
	     <li class="current home">
		 <a href="indexback.html"></a>
		 </li>
	     
		<li>
		<a href="affiuser.php" class="type1">Afficher</a>
		</li>
		<li>
		<a href="modiuser.php" class="type1">Modifier</a>
		</li>
		<li>
		<a href="suppriuser.php" class="type1">Supprimer</a>
		</li>
		
		<li>
		<a href="javascript:self.print()" class="type1">Imprimer </a>
		</li>
		
	<li>	
<form id="form1" name="form1" method="post" action="recherche.php">
<input type="text" name="rech" value=""  />
</form>
</li>

</li>
		<div class="clear"></div>
		</ul>
		<div class="clear"></div>
		</div>
		</div>
		


		 <div id="innercontent">  
  <table class="hovertable">
<tr>
	<th>Id  personne</th><th>Nom</th><th>Prénom</th><th>Pseudo</th><th>Email</th><th>Sexe</th><th>Pays</th><th>Age</th><th>Password</th>
</tr>
		<?php
include("../connexion.php");
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
$rowquery=mysql_fetch_array(mysql_query("select count(*) from util"));
$rowcount=$rowquery[0];

$requete="select * from util LIMIT ".$count." OFFSET ".($page*$count);


$resultat =mysql_query($requete) or die(mysql_error());

?>

  
  
  <?php ?>
  <?php while ($data= mysql_fetch_array($resultat)) {  ?>
<tr>
    <td> <?php  echo $data['id']; ?></td>
    <td><?php echo $data['nom'];?></td>
    <td><?php echo $data['prenom'];?></td>
	<td><?php echo $data['pseudo'];?></td>
    <td><?php echo $data['email'];?></td>
    <td><?php echo $data['sexe'];?></td>
    <td><?php echo $data['pays'];?></td>
    <td><?php echo $data['age'];?></td>
	<td><?php echo $data['password'];?></td>
    </tr>
  <?php } ?>
</table>
<div class="pagination">
 <?php 
 if($page>0) echo "<a href=\"affiuser.php?page=".($page-1)."\"><img src=images/left.png width=16px /></a> |";
 
 for($i=0;$i<$rowcount;$i+=$count){
	if($page==$i/$count) echo "<b>";
	echo "<a href=\"affiuser.php?page=".($i/$count)."\"> ".(($i/$count)+1)." </a> |";
	if($page==$i/$count) echo "</b>";
 }


  if($page<($rowcount/$count)-1) echo "<a href=\"affiuser.php?page=".($page+1)."\"><img src=images/right.png width=16px /></a>"; 
   
   ?>
   </div>
</form>
    
     </div>

		</body>
		</html>
		<?php
}
else
{
	echo "connectez vous";
	header("refresh:3; url=../log.html");
	}
?>