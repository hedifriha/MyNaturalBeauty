<?php
session_start();
if($_SESSION['id']==1)
{
	echo 'bonjour '.$_SESSION['pseudo'];

}
else
	echo 'bonjour visiteur';


?>