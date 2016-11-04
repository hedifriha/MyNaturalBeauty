
<?php

$login="admin";
$password="123456";

$logR=$_POST["login"];
$pwdR=$_POST["password"];

if(isset($_POST["login"])&& isset( $_POST["password"])){
  if($logR==$login && $pwdR==$password)
  {
    session_start();
    $_SESSION['l']=$logR;
	$_SESSION['p']=$pwdR;
	header('location:pagemembre.php');

}
else{
echo'<body onLoad="alert(\'membre non reconnu...\')">';
echo'<meta http-equiv="refresh"
content="0;URL=login.html">';
}
}
else{ 
echo "veuillez saisir votre login et votre password";
header('refresh:1; URL=login.html');
}




?>