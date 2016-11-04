<?php

//Cette page permet d'initialiser le site en verifiant par exemple si le membre est connecté
session_start();
header('Content-type: text/html;charset=UTF-8');
if(isset($_SESSION['login']))
{
	$cnn = mysql_query('select password,id from util where pseudo="'.mysql_real_escape_string($_SESSION['login']).'"');
	$dn_cnn = mysql_fetch_array($cnn);
	$_SESSION['userid']=$dn_cnn['id'];/*
	if(sha1($dn_cnn['password'])==$_COOKIE['password'] and mysql_num_rows($cnn)>0)
	{
		$_SESSION['l'] = $_COOKIE['username'];
		$_SESSION['userid'] = $dn_cnn['id'];
		echo "ok";
		echo $_SESSION['userid'];
	}*/
}
?>