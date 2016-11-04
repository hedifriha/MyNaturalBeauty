<?php
//Cette page permet aux utilisateurs de se connecter ou de se deconnecter
include('config.php');
if(isset($_SESSION['l']))
{
	unset($_SESSION['l']);/*
	setcookie('username', '', time()-100);
	setcookie('password', '', time()-100);*/
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
        <title>Connexion</title>
    </head>
    <body>
<header>
	   <img src="images/logo.jpg"  width="960px" />
	   </header>

	<div class="header">
        	<a href="<?php echo $url_home; ?>"><img src="<?php echo $design; ?>/images/logo.png" alt="Espace Membre" /></a>
	    </div>
		<div id="innercontent">   

    	
<div class="message">Vous avez bien &eacute;t&eacute; d&eacute;connect&eacute;.<br />
<a href="<?php echo $url_home; ?>">Accueil</a></div>
<?php
}
else
{
	$ousername = '';
	if(isset($_POST['l'], $_POST['p']))
	{
		if(get_magic_quotes_gpc())
		{
			$ousername = stripslashes($_POST['username']);
			$username = mysql_real_escape_string(stripslashes($_POST['username']));
			$password = stripslashes($_POST['password']);
		}
		else
		{
			$username = mysql_real_escape_string($_POST['username']);
			$password = $_POST['password'];
		}
		$req = mysql_query('select password,id from users where username="'.$username.'"');
		$dn = mysql_fetch_array($req);
		
		if($dn['password']==$password and mysql_num_rows($req)>0)
		{
			$form = false;
			$_SESSION['l'] = $_POST['username'];
			$_SESSION['userid'] = $dn['id'];
			if(isset($_POST['memorize']) and $_POST['memorize']=='yes')
			{
				$one_year = time()+(60*60*24*365);
				setcookie('username', $_POST['username'], $one_year);
				setcookie('password', sha1($password), $one_year);
			}
			while( mysql_fetch_array($req))
			{?>  <audio controls>
  <source src="Avici.ogg" type="audio/ogg">
  <source src="Avici.mp3" type="audio/mpeg">
		</audio><?php }
	/*	$res1 = mysql_query('select username from users where username="'.$username.'"');
        $res2 = mysql_query('select password from users where password="'.$password.'"');
				$had1 = mysql_fetch_array($res1);
                $had2 = mysql_fetch_array($res2);
                 while(mysql_fetch_array($res1)="administrateur" && mysql_fetch_array($res2)="000000")
				 { echo "<strong><center>Bienvenue </center> </strong>";
				header("refresh:1;url=delete_category.php");}
*/
			?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="styles.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="print.css" media="print" />
      <!--  <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" /> -->                <title>Connexion</title>
    </head>
    <body><header>
	   <img src="images/logo.jpg"  width="960px" />
	   </header>
	<div class="header">
        	<a href="<?php echo $url_home; ?>"><img src="<?php echo $design; ?>/images/logo.png" alt="Espace Membre" /></a>
	    </div>
	<div id="innercontent">
    	
<div class="message">Vous avez bien &eacute;t&eacute; connect&eacute;. Vous pouvez acc&eacute;der &agrave; votre espace membre.<br />
<a href="<?php echo $url_home; ?>">Accueil</a></div>
<?php
		}
		else
		{
			$form = true;
			$message = 'La combinaison que vous avez entr&eacute; n\'est pas bonne.';
		}
	}
	else
	{
		$form = true;
	}
	if($form)
	{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="styles.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="print.css" media="print" />
      <!--  <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" /> -->                <title>Connexion</title>
    </head>
    <body><header>
	   <img src="images/logo.jpg"  width="960px" />
	   </header>
    	<div class="header">
        	<a href="<?php echo $url_home; ?>"><img src="<?php echo $design; ?>/images/logo.png" alt="Espace Membre" /></a>
	    </div>
		<div id="innercontent">
<?php
if(isset($message))
{
	echo '<div class="message">'.$message.'</div>';
}
?>
<div class="content">
<?php
$nb_new_pm = mysql_fetch_array(mysql_query('select count(*) as nb_new_pm from pm where ((user1="'.$_SESSION['userid'].'" and user1read="no") or (user2="'.$_SESSION['userid'].'" and user2read="no")) and id2="1"'));
$nb_new_pm = $nb_new_pm['nb_new_pm'];
?>
<div class="box">
	<div class="box_left">
    	<a href="<?php echo $url_home; ?>">Index du Forum</a> &gt; Connexion
    </div>
	<div class="box_right">
    	<a href="list_pm.php">Vos messages(<?php echo $nb_new_pm; ?>)</a> - <a href="profile.php?id=<?php echo $_SESSION['userid']; ?>"><?php echo htmlentities($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?></a> (<a href="login.php">Déconnexion</a>)
    </div>
    <div class="clean"></div>
</div>
    <form action="login.php" method="post">
        Veuillez entrer vos identifiants pour vous connecter:<br />
        <div class="login">
            <label for="username">Nom d'utilisateur</label><input type="text" name="username" id="username" value="<?php echo htmlentities($ousername, ENT_QUOTES, 'UTF-8'); ?>" /><br />
            <label for="password">Mot de passe</label><input type="password" name="password" id="password" /><br />
            <label for="memorize">Se souvenir</label><input type="checkbox" name="memorize" id="memorize" value="yes" /><br />
            <input type="submit" value="Connection" />
		</div>
    </form>
</div>
<?php
	}
}
?>
	</body>
</html>