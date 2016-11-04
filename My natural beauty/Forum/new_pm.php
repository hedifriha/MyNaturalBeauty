<?php
//Cette page permet d'envoyer un message privé
include('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Nouveau message </title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/superfish.css" media="screen">
		<link href="css/camera.css" rel="stylesheet" type="text/css" media="all" />	
		<link href="css/newcss.css" rel="stylesheet" type="text/css" media="all" />	
		<!--
<link rel="stylesheet" href="styles.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="print.css" media="print" />
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" /> -->     
    </head>
    <body><header>
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

<?php
if(isset($_SESSION['login']))
{
$form = true;
$otitle = '';
$orecip = '';
$omessage = '';
if(isset($_POST['title'], $_POST['recip'], $_POST['message']))
{
	$otitle = $_POST['title'];
	$orecip = $_POST['recip'];
	$omessage = $_POST['message'];
	//On enleve lechappement si get_magic_quotes_gpc est active
	if(get_magic_quotes_gpc())
	{
		$otitle = stripslashes($otitle);
		$orecip = stripslashes($orecip);
		$omessage = stripslashes($omessage);
	}
	if($_POST['title']!='' and $_POST['recip']!='' and $_POST['message']!='')
	{
		$title = mysql_real_escape_string($otitle);
		$recip = mysql_real_escape_string($orecip);
		$message = mysql_real_escape_string(nl2br(htmlentities($omessage, ENT_QUOTES, 'UTF-8')));
		$dn1 = mysql_fetch_array(mysql_query('select count(id) as recip, id as recipid, (select count(*) from pm) as npm from util where pseudo="'.$recip.'"'));
		if($dn1['recip']==1)
		{
			if($dn1['recipid']!=$_SESSION['userid'])
			{
				$id = $dn1['npm']+1;
				if(mysql_query('insert into pm (id, id2, title, user1, user2, message, timestamp, user1read, user2read)values("'.$id.'", "1", "'.$title.'", "'.$_SESSION['userid'].'", "'.$dn1['recipid'].'", "'.$message.'", "'.time().'", "yes", "no")'))
				{
	?>
	<div class="message">Le message a bien &eacute;t&eacute; envoy&eacute;.<br />
	<a href="list_pm.php">Liste de mes messages priv&eacute;s</a></div>
	<?php
					$form = false;
				}
				else
				{
					$error = 'Une erreur s\'est produite lors de l\'envoi du message.';
				}
			}
			else
			{
				$error = 'Vous ne pouvez pas envoyer un message &agrave; vous m&ecirc;me.';
			}
		}
		else
		{
			$error = 'Le destinataire de votre message n\'existe pas.';
		}
	}
	else
	{
		$error = 'Un des champs n\'est pas rempli.';
	}
}
elseif(isset($_GET['recip']))
{
	$orecip = $_GET['recip'];
}
if($form)
{
if(isset($error))
{
	echo '<div class="message">'.$error.'</div>';
}
?>
<div class="content">
<?php
$nb_new_pm = mysql_fetch_array(mysql_query('select count(*) as nb_new_pm from pm where ((user1="'.$_SESSION['userid'].'" and user1read="no") or (user2="'.$_SESSION['userid'].'" and user2read="no")) and id2="1"'));
$nb_new_pm = $nb_new_pm['nb_new_pm'];
?>
<div class="box">
	<div class="box_left">
    	<a href="<?php echo $url_home; ?>">Index du Forum</a> &gt; <a href="list_pm.php">Liste de vos MPs</a> &gt; Nouveau MP
    </div>
	<div class="box_right">
     	<a href="list_pm.php">Vos messages(<?php echo $nb_new_pm; ?>)</a> - <a href="profile.php?id=<?php echo $_SESSION['userid']; ?>"><?php echo htmlentities($_SESSION['login'], ENT_QUOTES, 'UTF-8'); ?></a> (<a href="login.php">Déconnexion</a>)
    </div>
    <div class="clean"></div>
</div>
	<h1>Nouveau message priv&eacute;</h1>
    <form action="new_pm.php" method="post">
		Veuillez remplir ce formulaire pour envoyer le MP.<br />
        <label for="title">Titre</label><input type="text" value="<?php echo htmlentities($otitle, ENT_QUOTES, 'UTF-8'); ?>" id="title" name="title" /><br />
        <label for="recip">Destinataire<span class="small">(Nom d'utilisateur)</span></label><input type="text" value="<?php echo htmlentities($orecip, ENT_QUOTES, 'UTF-8'); ?>" id="recip" name="recip" /><br />
        <label for="message">Message</label><textarea cols="40" rows="5" id="message" name="message"><?php echo htmlentities($omessage, ENT_QUOTES, 'UTF-8'); ?></textarea><br />
        <input type="submit" value="Envoyer" />
    </form>
</div>
<?php
}
}
else
{
?>
<div class="message">Vous devez &ecirc;tre connect&eacute; pour acc&eacute;der &agrave; cette page.</div>
<div class="box_login">
	<form action="login.php" method="post">
		<label for="username">Nom d'utilisateur</label><input type="text" name="username" id="username" /><br />
		<label for="password">Mot de passe</label><input type="password" name="password" id="password" /><br />
        <label for="memorize">Se souvenir</label><input type="checkbox" name="memorize" id="memorize" value="yes" />
        <div class="center">
	        <input type="submit" value="Login" /> <input type="button" onclick="javascript:document.location='signup.php';" value="S'inscrire" />
        </div>
    </form>
</div>
<?php
}
?>
	</body>
</html>