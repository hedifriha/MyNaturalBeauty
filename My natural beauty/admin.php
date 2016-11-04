<?php
session_start();
echo $_SESSION['pseudo'];
if($_SESSION['pseudo']=="admin")
echo "Bonjour admin";
else
echo "vous n'êtes pas admin";
?>

<a href="logout.php"> Déconnexion </a>
