
<link rel="stylesheet" href="styles.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="print.css" media="print" />

<?php

function seConnecter()
{
$host="localhost";
$user="root";
$pwd="";
$nombd="php2A5";

$lien=mysql_connect($host,$user,$pwd);
mysql_select_db($nombd,$lien);
}

?>