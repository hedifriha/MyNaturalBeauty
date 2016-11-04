<?php

function seConnecter()
{
$host="localhost";
$user="root";
$pwd="root";
$nombd="projet";

$lien=mysql_connect($host,$user,$pwd);
mysql_select_db($nombd,$lien);
}

?>