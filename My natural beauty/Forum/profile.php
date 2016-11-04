<?php
//Cette page permet d'afficher le profil d'un membre
include('config.php');
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
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" /> -->            <title>Profil d'un utilisateur</title>
    </head>
    <body><<header>
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
		

    	<div class="header">
        	<a href="<?php echo $url_home; ?>"><img src="<?php echo $design; ?>/images/logo.png" alt="Espace Membre" /></a>
	    </div>
		<div id="innercontent">   
        <div class="content">
<?php
if(isset($_SESSION['login']))
{
$nb_new_pm = mysql_fetch_array(mysql_query('select count(*) as nb_new_pm from pm where ((user1="'.$_SESSION['userid'].'" and user1read="no") or (user2="'.$_SESSION['userid'].'" and user2read="no")) and id2="1"'));
$nb_new_pm = $nb_new_pm['nb_new_pm'];
?>
<div class="box">
	<div class="box_left">
    	<a href="<?php echo $url_home; ?>">Index du Forum</a> &gt; <a href="users.php">Liste des utilisateurs</a> &gt; Profil d'un utilisateur
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
    	<a href="<?php echo $url_home; ?>">Index du Forum</a> &gt; <a href="users.php">Liste des utilisateurs</a> &gt; Profil d'un utilisateur
    </div>
	<div class="box_right">
    	 <a href="login.php">Connexion</a>
    </div>
    <div class="clean"></div>
</div>
<?php
}
if(isset($_GET['id']))
{
	$id = intval($_GET['id']);
	$dn = mysql_query('select pseudo, email from util where id="'.$id.'"');
	if(mysql_num_rows($dn)>0)
	{
		$dnn = mysql_fetch_array($dn);
?>
Voici le profil de "<?php echo htmlentities($dnn['pseudo']); ?>" :
<?php
if($_SESSION['userid']==$id)
{
?>
<br /><div class="center"><a href="edit_profile.php" class="button">Modifier mon profil</a></div>
<?php
}
?>
<table style="width:500px;">
	<tr>
    	<td><?php
/*if($dnn['avatar']!='')
{
	echo '<img src="'.htmlentities($dnn['avatar'], ENT_QUOTES, 'UTF-8').'" alt="Image Perso" style="max-width:100px;max-height:100px;" />';
}
else
{
	echo 'Cet utilisateur n\'a pas d\'image perso.';
}*/
?></td>
    	<td class="left"><h1><?php echo htmlentities($dnn['pseudo'], ENT_QUOTES, 'UTF-8'); ?></h1>
    	Email: <?php echo htmlentities($dnn['email'], ENT_QUOTES, 'UTF-8'); ?><br />
        </td>
    </tr>
</table>
<?php
if(isset($_SESSION['login']) and $_SESSION['login']!=$dnn['pseudo'])
{
?>
<br /><a href="new_pm.php?recip=<?php echo urlencode($dnn['pseudo']); ?>" class="big">Envoyer un MP à "<?php echo htmlentities($dnn['pseudo'], ENT_QUOTES, 'UTF-8'); ?>"</a>
<?php
}
	}
	else
	{
		echo 'Cet utilisateur n\'existe pas.';
	}
}
else
{
	echo 'L\'identifiant de l\'utilisateur n\'est pas d&eacute;fini.';
}
?>
		</div>
	</body>
</html>