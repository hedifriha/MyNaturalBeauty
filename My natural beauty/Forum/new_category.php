<?php
//Cette page permet d'ajouter une categorie
include('config.php');
if(isset($_SESSION['login']) and $_SESSION['login']=="admin")
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Back Office</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/superfish.css" media="screen">
		<link href="css/camera.css" rel="stylesheet" type="text/css" media="all" />	
		<link href="css/newcss.css" rel="stylesheet" type="text/css" media="all" />	
		<!--
<link rel="stylesheet" href="styles.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="print.css" media="print" />
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" /> -->            <title>Nouvelle catégorie - Forum</title>
    </head>
    <body>
	<header>
	<img src="images/logo2.2.png" width="500" height="200">
	   </header>
	   
	</br>
	<div class="header">
        <!--	<a href="<?php echo $url_home; ?>"><img src="<?php echo $design; ?>/images/logo.png" alt="Forum" /></a> -->
	    </div>
	<div class="top-nav">
						<ul class="sf-menu sf-menu2" id="example">
							<li  class="current home">
							<a href="index.html"></a>
						</li>
						<li >
							<a href="../../about.html">A-Propos</a>
						</li>
						<li>
							<a href="../../gallery.html"> Articles</a>
						
						</li>
						<li>
							<a href="../../cheveux.html">Produits</a>
						</li>
						
						<li>
							<a href="../../centre.html">Centres</a>
						</li>
						<li class="active">>
							<a href="indexforum.php">Forum</a>
						</li>
						
						<li>
							<a href="../../Inscription.html">Inscription</a>
						</li>	
						<div class="clear"> </div>
					</ul>
					</div>
					<div class="clear"> </div>
				</div>
				<!---End-header---->
			 </div>

    	
			<div id="innercontent">  
        <div class="content">
<?php
$nb_new_pm = mysql_fetch_array(mysql_query('select count(*) as nb_new_pm from pm where ((user1="'.$_SESSION['userid'].'" and user1read="no") or (user2="'.$_SESSION['userid'].'" and user2read="no")) and id2="1"'));
$nb_new_pm = $nb_new_pm['nb_new_pm'];
?>
<div class="box">
	<div class="box_left">
    	<a href="<?php echo $url_home; ?>">Index du Forum</a> &gt; Nouvelle catégorie
    </div>
	<div class="box_right">
    	<a href="list_pm.php">Vos messages(<?php echo $nb_new_pm; ?>)</a> - <a href="profile.php?id=<?php echo $_SESSION['userid']; ?>"><?php echo htmlentities($_SESSION['login'], ENT_QUOTES, 'UTF-8'); ?></a> (<a href="login.php">Déconnexion</a>)
    </div>
    <div class="clean"></div>
</div>
<?php
if(isset($_POST['name'], $_POST['description']) and $_POST['name']!='')
{
	$name = $_POST['name'];
	$description = $_POST['description'];
	if(get_magic_quotes_gpc())
	{
		$name = stripslashes($name);
		$description = stripslashes($description);
	}
	$name = mysql_real_escape_string($name);
	$description = mysql_real_escape_string($description);
	if(mysql_query('insert into categories (id, name, description, position) select ifnull(max(id), 0)+1, "'.$name.'", "'.$description.'", count(id)+1 from categories'))
	{
	?>
	<div class="message">La catégorie a bien été créée.<br />
	<a href="<?php echo $url_home; ?>">Retourner à l'index du Forum</a></div>
	<?php
	}
	else
	{
		echo 'Une erreur s\'est produite lors de la création de la catégorie.';
	}
}
else
{
?>
<form action="new_category.php" method="post">
	<label for="name">Nom</label><input type="text" name="name" id="name" /><br />
	<label for="description">Description</label>(html accepté)<br />
    <textarea name="description" id="description" cols="70" rows="6"></textarea><br />
    <input type="submit" value="Créer" />
</form>
<?php
}
?>
		</div>
	</body>
</html>
<?php
}
else
{
	echo '<h2>Vous devez être connecté en tant qu\'administrateur pour accéder à cette page: <a href="login.php">Connexion</a> - <a href="signup.php">Inscription</a></h2>';
}
?>