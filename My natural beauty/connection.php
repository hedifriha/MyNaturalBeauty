<?php

mysql_connect('localhost', 'root', '');
mysql_select_db('projet');

$url_home = 'Forum/indexforum.php';
$design = 'default';


include('Forum/init.php');




if(isset($_POST["login"])&& isset( $_POST["password"]))
{
	$logR=$_POST["login"];
	$pwdR=$_POST["password"];
	$qry=mysql_query("select * from util where pseudo='$logR' and password='$pwdR';");
	while($ligne=mysql_fetch_array($qry))
	{

    session_start();
    $_SESSION['l']=$ligne['login'];
	$_SESSION['p']=$ligne['password'];
	if($_POST["login"]=="admin")
	{
	header('location:indexback.html');
	}
	else
	{header('location:index.php');}
	}
	}


else{
echo'<body onLoad="alert(\'membre non reconnu...\')">';
echo'<meta http-equiv="refresh"
content="0;URL=login.html">';
}
/*
else{ 
echo "veuillez saisir votre login et votre password";
header('refresh:1; URL=login.html');
}
*/



?>