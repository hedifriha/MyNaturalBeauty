<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<?php

function seConnecter(){
$host="localhost";
$user="root";
$pwd="";
$nomdb="projet";
$lien=mysql_connect($host,$user,$pwd);
mysql_select_db($nomdb,$lien);
}

?>
</body>
</html>