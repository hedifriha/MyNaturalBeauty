<?php
//Cette page permet de lire un message prive
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
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" /> -->     
		<title>Lecture d'un MP</title>
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
						<li class="active">
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

<?php
if(isset($_SESSION['login']))
{
if(isset($_GET['id']))
{
$id = intval($_GET['id']);
$req1 = mysql_query('select title, user1, user2 from pm where id="'.$id.'" and id2="1"');
$dn1 = mysql_fetch_array($req1);
if(mysql_num_rows($req1)==1)
{
if($dn1['user1']==$_SESSION['userid'] or $dn1['user2']==$_SESSION['userid'])
{
if($dn1['user1']==$_SESSION['userid'])
{
	mysql_query('update pm set user1read="yes" where id="'.$id.'" and id2="1"');
	$user_partic = 2;
}
else
{
	mysql_query('update pm set user2read="yes" where id="'.$id.'" and id2="1"');
	$user_partic = 1;
}
$req2 = mysql_query('select pm.timestamp, pm.message, util.id as userid, util.pseudo  from pm, util where pm.id="'.$id.'" and util.id=pm.user1 order by pm.id2');
if(isset($_POST['message']) and $_POST['message']!='')
{
	$message = $_POST['message'];
	//On enleve lechappement si get_magic_quotes_gpc est active
	if(get_magic_quotes_gpc())
	{
		$message = stripslashes($message);
	}
	//On echape le message pour pouvoir le mettre dans une requette SQL
	$message = mysql_real_escape_string(nl2br(htmlentities($message, ENT_QUOTES, 'UTF-8')));
	//On envoi la reponse et le statut de la discution passe a non-lu pour lautre utilisateur
	if(mysql_query('insert into pm (id, id2, title, user1, user2, message, timestamp, user1read, user2read)values("'.$id.'", "'.(intval(mysql_num_rows($req2))+1).'", "", "'.$_SESSION['userid'].'", "", "'.$message.'", "'.time().'", "", "")') and mysql_query('update pm set user'.$user_partic.'read="yes" where id="'.$id.'" and id2="1"'))
	{
?>
<div class="message">Votre message a bien &eacute;t&eacute; envoy&eacute;.<br />
<a href="read_pm.php?id=<?php echo $id; ?>">Retour &agrave; la discussion</a></div>
<?php
	}
	else
	{
?>
<div class="message">Une erreur c'est produite lors de l'envoi du message.<br />
<a href="read_pm.php?id=<?php echo $id; ?>">Retour &agrave; la discussion</a></div>
<?php
	}
}
else
{
//On affiche la liste des messages
?>
<div class="content">
<?php
if(isset($_SESSION['login']))
{
$nb_new_pm = mysql_fetch_array(mysql_query('select count(*) as nb_new_pm from pm where ((user1="'.$_SESSION['userid'].'" and user1read="no") or (user2="'.$_SESSION['userid'].'" and user2read="no")) and id2="1"'));
$nb_new_pm = $nb_new_pm['nb_new_pm'];
?>
<div class="box">
	<div class="box_left">
    	<a href="<?php echo $url_home; ?>">Index du Forum</a> &gt; <a href="list_pm.php">Liste de vos MPs</a> &gt; Lecture d'un MP
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
    	<a href="<?php echo $url_home; ?>">Index du Forum</a> &gt; <a href="list_pm.php">Liste de vos MPs</a> &gt; Lecture d'un MP
    </div>
	<div class="box_right">
    	<a href="../login.php">Connexion</a>
    </div>
    <div class="clean"></div>
</div>
<?php
}
?>
<h1><?php echo $dn1['title']; ?></h1>
<table class="messages_table">
	<tr>
    	<th class="author">Utilisateur</th>
        <th>Message</th>
    </tr>
<?php
while($dn2 = mysql_fetch_array($req2))
{
?>
	<tr>
    	<td class="author center"><?php
/*if($dn2['avatar']!='')
{
	echo '<img src="'.htmlentities($dn2['avatar']).'" alt="Image Perso" style="max-width:100px;max-height:100px;" />';
}*/
?><br /><a href="profile.php?id=<?php echo $dn2['userid']; ?>"><?php echo $dn2['pseudo']; ?></a></td>
    	<td class="left"><div class="date">Date d'envoi: <?php echo date('d/m/Y H:i:s' ,$dn2['timestamp']); ?></div>
    	<?php echo $dn2['message']; ?></td>
    </tr>
<?php
}
?>
</table><br />
<h2>R&eacute;pondre</h2>
<div class="center">
    <form action="read_pm.php?id=<?php echo $id; ?>" method="post">
    	<label for="message" class="center">Message</label><br />
        <textarea cols="40" rows="5" name="message" id="message"></textarea><br />
        <input type="submit" value="Envoyer" />
    </form>
</div>
</div>
<?php
}
}
else
{
	echo '<div class="message">Vous n\'avez pas le droit d\'acc&eacute;der &agrave; cette page.</div>';
}
}
else
{
	echo '<div class="message">Ce message n\'existe pas.</div>';
}
}
else
{
	echo '<div class="message">L\'identifiant du message n\'est pas d&eacute;fini.</div>';
}
}
else
{
?>
<div class="message">Vous devez &ecirc;tre connect&eacute; pour acc&eacute;der &agrave; cette page:</div>
<div class="box_login">
	<form action="../login.php" method="post">
		<label for="username">Nom d'utilisateur</label><input type="text" name="username" id="username" /><br />
		<label for="password">Mot de passe</label><input type="password" name="password" id="password" /><br />
        <label for="memorize">Se souvenir</label><input type="checkbox" name="memorize" id="memorize" value="yes" />
        <div class="center">
	        <input type="submit" value="Login" />
        </div>
    </form>
</div>
<?php
}
?>
	</body>
</html>