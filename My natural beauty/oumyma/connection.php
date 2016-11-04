<html>
<head>
<title>Back Office</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/superfish.css" media="screen">
		<link href="css/camera.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
</br> </br> </br> </br> </br> </br> 
<div class="content">
				<!---start-top-grids----->
				<div class="top-grids">
					<div class="wrap">
						<div class="top-grid last-grid">
							<a class="icon33" href="indexArticle.html"> </a>
							<h2><span>Gestion</span>des articles</h2>
						</div>
						<div class="top-grid last-grid">
							<a class="icon33" href="Forum/indexforum.php"> </a>
							<h2><span>Gestion</span>du forums</h2>
						</div>
						<div class="top-grid last-grid">
							<a class="icon33" href="#"> </a>
							<h2><span>Gestion</span>des produits</h2>
																 </br> </br>
										 </br> </br>
                        </div>

			<div id="nour" >			
						<div class="top-grid last-grid" >
							<a class="icon33" href="#"> </a>
							<h2><span>Gestion</span>des centres</h2>
						</div>						</div>
			<div id="nour2" >			

						<div class="top-grid last-grid">
							<a class="icon33" href="#"> </a>
							<h2><span>Gestion</span>des utilisateurs</h2>
						</div>
						<div class="top-grid last-grid">
							<a class="icon33" href="indexConseil.html"> </a>
							<h2><span>Gestion</span>des conseil</h2>
						</div>
						</div>
						<div class="clear"> </div>
					</div>
				</div>
				<!---End-top-grids----->				</div>

				<!---start-mid-grids----->

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
	/*header('location:pagemembre.php');*/

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
				
				
				
				
				
				</body>
</html>






	