
<?php

mysql_connect('localhost', 'root', '');
mysql_select_db('projet');






if(isset($_POST["login"])&& isset( $_POST["password"]))
{
	$logR=$_POST["login"];
	$pwdR=$_POST["password"];
	$qry=mysql_query("select * from authentifier where login='$logR' and password='$pwdR';");
	while($ligne=mysql_fetch_array($qry))
	{
    session_start();
    $_SESSION['l']=$ligne['login'];
	$_SESSION['p']=$ligne['password'];
	if($_POST["login"]=="admin")
	{
	header('location:../produitclient.html');

}

}
}
/*
else{ 
echo "veuillez saisir votre login et votre password";
header('refresh:1; URL=login.html');
}
*/



?>