<?php
include('connection.php');	
if(isset($_POST['login'])&& isset($_POST['password']))
{
	$pseudo=$_POST['login'];
	$password=$_POST['password'];
	$req="select * from util where pseudo='$pseudo' and password='$password';";
	$res=mysql_query($req);
	if(mysql_num_rows($res)==1)
	{	
		$row=mysql_fetch_array($res);
		$id=$row['id'];
		session_start();
		$_SESSION['id']=$id;
		$_SESSION['login']=$pseudo;
		$_SESSION['password']=$password;
		if($_SESSION['login']=="admin")
		{
	
			header("location:indexback.html");
		}
		else 
		
			header("location:index.php");
	
	}
	else
		echo "noob";
}



?>