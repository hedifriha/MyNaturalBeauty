<?php

function seConnecter()
{
$host="localhost";
$user="root";
$pwd="";
$nombd="pfc";

$lien=mysql_connect($host,$user,$pwd);
mysql_select_db($nombd,$lien);
}

?>