<?php
session_start();
if(isset($_SESSION['l'])&& isset($_SESSION['p'])){
?>
<html>
<head></head>
<body>
<?php 
echo "votre login est:" .$_SESSION['l']."<br> et votre password est : ".$_SESSION['p']."<br> <a href=\"logout.php\"> se deconnecter </a>  ";

?>
</body>
</html>
<?php
}
else
echo"vous n'etes pas autorises a accéder"
?>