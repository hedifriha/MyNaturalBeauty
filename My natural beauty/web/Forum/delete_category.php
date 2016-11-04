<?php
//Cette page permet de supprimer une catégorie
include('config.php');
if(isset($_GET['id']))
{
$id = intval($_GET['id']);
$dn1 = mysql_fetch_array(mysql_query('select count(id) as nb1, name, position from categories where id="'.$id.'" group by id'));
if($dn1['nb1']>0)
{
if(isset($_SESSION['l']) and $_SESSION['l']=="admin")
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
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" /> -->               <title>Supprimer une catégorie - <?php echo htmlentities($dn1['name'], ENT_QUOTES, 'UTF-8'); ?> - Forum</title>
    </head>
    <body><header>
	   <img src="images/logo.jpg"  width="960px" />
	   </header>
    	<div class="header">
        	<a href="<?php echo $url_home; ?>"><img src="<?php echo $design; ?>/images/logo.png" alt="Forum" /></a>
	    </div>
		<div id="innercontent">
        <div class="content">
<?php
$nb_new_pm = mysql_fetch_array(mysql_query('select count(*) as nb_new_pm from pm where ((user1="'.$_SESSION['userid'].'" and user1read="no") or (user2="'.$_SESSION['userid'].'" and user2read="no")) and id2="1"'));
$nb_new_pm = $nb_new_pm['nb_new_pm'];
?>
<div class="box">
	<div class="box_left">
    	<a href="<?php echo $url_home; ?>">Index du Forum</a> &gt; <?php echo htmlentities($dn1['name'], ENT_QUOTES, 'UTF-8'); ?> &gt; Supprimer la catégorie
    </div>
	<div class="box_right">
    	<a href="list_pm.php">Vos messages(<?php echo $nb_new_pm; ?>)</a> - <a href="profile.php?id=<?php echo $_SESSION['userid']; ?>"><?php echo htmlentities($_SESSION['l'], ENT_QUOTES, 'UTF-8'); ?></a> (<a href="login.php">Déconnexion</a>)
    </div>
    <div class="clean"></div>
</div>
<?php
if(isset($_POST['confirm']))
{
	if(mysql_query('delete from categories where id="'.$id.'"') and mysql_query('delete from topics where parent="'.$id.'"') and mysql_query('update categories set position=position-1 where position>"'.$dn1['position'].'"'))
	{
	?>
	<div class="message">La catégorie et ses sujets a bien été supprimée.<br />
	<a href="<?php echo $url_home; ?>">Retourner à l'index du Forum</a></div>
	<?php
	}
	else
	{
		echo 'Une erreur s\'est produite lors de la suppresssion de la catégorie et de ses sujets.';
	}
}
else
{
?>
<form action="delete_category.php?id=<?php echo $id; ?>" method="post">
	Êtes-vous sûr de vouloir supprimer cette catégorie et l'ensemble de ses sujets?
    <input type="hidden" name="confirm" value="true" />
    <input type="submit" value="Oui" /> <input type="button" value="Non" onclick="javascript:history.go(-1);" />
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
}
else
{
	echo '<h2>La catégorie que vous désirez supprimer n\'existe pas.</h2>';
}
}
else
{
	echo '<h2>L\'identifiant de la catégorie à supprimer n\'est pas défini</h2>';
}
?>