<?php
//Cette page permet dafficher la liste des categories
include('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="Description" content="forum beaute natural(natural beauty) et des soins ... " />

	<title>Forum  beauty natural</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/superfish.css" media="screen">
		<link href="css/camera.css" rel="stylesheet" type="text/css" media="all" />	
		<link href="css/newcss.css" rel="stylesheet" type="text/css" media="all" />	

 <!-- <link rel="stylesheet" href="styles.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="print.css" media="print" />-->
       <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" /> 
    </head>
    
<body>
	
		<!---start-wrap---->
		<div class="wrap">
			<!---start-header---->
			<div >
				<div class="logo">
					<a href="index.html"><img src="../images/logo.png" width="300px" height="150px" title="naturex" /></a>
				</div>
				<div class="top-social-icons">
					<ul>
						<li><a class="icon1" href="C:\wamp\www\My natural beauty\fullcalendar-1.6.4\fullcalendar-1.6.4\demos\agenda-views.html"target="_blank"> </a></li>
						<li><a class="icon2" href="#"> </a></li>
						<li><a class="icon3" href="#"> </a></li>
						<li><a class="icon4" href="#"> </a></li>


					</ul>
				</div>
				<div class="clear"> </div>
			</div>
				


	<div class="top-nav">
						<ul class="sf-menu sf-menu2" id="example">
							<li  class="current home">
							<a href="../index.php"></a>
						</li>
						<li >
							<a href="../about.html">A-Propos</a>
						</li>
						<li>
							<a href="../gallery.html"> Articles</a>
						
						</li>
						<li>
							<a href="../cheveux.html">Produits</a>
						</li>
						
						<li>
							<a href="../centre.html">Centres</a>
						</li>
						<li class="active">
							<a href="indexforum.php">Forum</a>
						</li>
						
						<li>
							<a href="../Inscription.html">Inscription</a>
						</li>	
						<div class="clear"> </div>
					</ul>
					</div>
					<div class="clear"> </div>
				</div>
				<!---End-header---->
			 </div>

    	
        <div class="content">
<?php
if(isset($_SESSION['login']))
{

$nb_new_pm = mysql_fetch_array(mysql_query('select count(*) as nb_new_pm from pm where ((user2="'.$_SESSION['userid'].'" and user2read="no"))'));
$nb_new_pm = $nb_new_pm['nb_new_pm'];
?>
<div class="box">
	<div >
    	<a href="<?php echo $url_home; ?>"><h2>Index du Forum </h2></a>
    </div>
	<div class="box_right">
    	<a href="list_pm.php">Vos messages(<?php echo $nb_new_pm; ?>)</a> - <a href="profile.php?id=<?php echo $_SESSION['userid']; ?>"><?php echo htmlentities($_SESSION['login'], ENT_QUOTES, 'UTF-8'); ?></a> (<a href="login.php">Déconnexion</a>)
    </div>
	<div class="clean"></div>
</div>
<?php
}
else
{
?>
<div class="box">
	<div class="box_left">
    	<a href="<?php echo $url_home; ?>">Index du Forum</a>
    </div>
	<div class="box_right">
    	- <a href="../log.html">Connexion</a>
    </div>
	<div class="clean"></div>
</div>
<?php
}
if(isset($_SESSION['login']) and $_SESSION['login']=="admin")
{
?>
	<a href="new_category.php" class="button">Nouvelle Catégorie</a>
<?php
}
?>
<table class="categories_table">
	<tr>
    	<th class="forum_cat">Catégorie</th>
    	<th class="forum_ntop">Sujets</th>
    	<th class="forum_nrep">Réponses</th>
<?php
if(isset($_SESSION['login']) and $_SESSION['login']=="admin")
{
?>
    	<th class="forum_act">Action</th>
<?php
}
?>
	</tr>
<?php
$dn1 = mysql_query('select c.id, c.name, c.description, c.position, (select count(t.id) from topics as t where t.parent=c.id and t.id2=1) as topics, (select count(t2.id) from topics as t2 where t2.parent=c.id and t2.id2!=1) as replies from categories as c group by c.id order by c.position asc');
$nb_cats = mysql_num_rows($dn1);
while($dnn1 = mysql_fetch_array($dn1))
{
?>
	<tr>
    	<td class="forum_cat"><a href="list_topics.php?parent=<?php echo $dnn1['id']; ?>" class="title"><?php echo htmlentities($dnn1['name'], ENT_QUOTES, 'UTF-8'); ?></a>
        <div class="description"><?php echo $dnn1['description']; ?></div></td>
    	<td><?php echo $dnn1['topics']; ?></td>
    	<td><?php echo $dnn1['replies']; ?></td>
<?php
if(isset($_SESSION['login']) and $_SESSION['login']=="admin")
{
?>
    	<td><a href="delete_category.php?id=<?php echo $dnn1['id']; ?>"><img src="<?php echo $design; ?>/images/delete.png" alt="Delete" /></a>
		<?php if($dnn1['position']>1){ ?><a href="move_category.php?action=up&id=<?php echo $dnn1['id']; ?>"><img src="<?php echo $design; ?>/images/up.png" alt="Faire Monter" /></a><?php } ?>
		<?php if($dnn1['position']<$nb_cats){ ?><a href="move_category.php?action=down&id=<?php echo $dnn1['id']; ?>"><img src="<?php echo $design; ?>/images/down.png" alt="Faire Descendre" /></a><?php } ?>
		<a href="edit_category.php?id=<?php echo $dnn1['id']; ?>"><img src="<?php echo $design; ?>/images/edit.png" alt="Edit" /></a></td>
<?php
}
?>
    </tr>
<?php
}
?>
</table>


<?php
if(isset($_SESSION['login']) and $_SESSION['login']=="admin")
{
?>
	<!-- <a href="new_category.php" class="button">Nouvelle Catégorie</a> -->
<?php
}

if(!isset($_SESSION['login']))
{
?>
<!-- <div class="box_login">
	<form action="login.php" method="post">
		<label for="username">Nom d'utilisateur</label><input type="text" name="username" id="username" /><br />
		<label for="password">Mot de passe</label><input type="password" name="password" id="password" /><br />
        <label for="memorize">Se souvenir</label><input type="checkbox" name="memorize" id="memorize" value="yes" />
        <div class="center">
	        <input type="submit" value="Login" /> <input type="button" onclick="javascript:document.location='signup.php';" value="S'inscrire" />
        </div>
    </form>
</div> -->
<?php

}
?>
		</div>
		
	
</div>	</body>
</html>