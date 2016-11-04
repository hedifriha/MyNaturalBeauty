
<!DOCTYPE HTML>
<html>
<meta charset="utf-8">
	<head>
	<style type="text/css">
      a.type1 { color: white; }
	  </style>
		<title>index front</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/superfish.css" media="screen">
		<link href="css/camera.css" rel="stylesheet" type="text/css" media="all" />
		<script src="js/jquery.js"></script>
		<script src="js/superfish.js"></script>
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script>
		(function($){ //create closure so we can safely use $ as alias for jQuery
			$(document).ready(function(){
				// initialise plugin
				var example = $('#example').superfish({
					//add options here if required
				});
				// buttons to demonstrate Superfish's public methods
				$('.destroy').on('click', function(){
					example.superfish('destroy');
				});
				$('.init').on('click', function(){
					example.superfish();
				});
				$('.open').on('click', function(){
					example.children('li:first').superfish('show');
				});
				$('.close').on('click', function(){
					example.children('li:first').superfish('hide');
				});
			});
		})(jQuery);
		</script>
		<script>
		jQuery(function(){
			jQuery('#camera_wrap_1').camera({
				height: '500',
				pagination: false,
				thumbnails: false,
				imagePath: '../images/'
			});

		});
	</script>
	</head>
	<body>
		<!---start-wrap---->
		<div class="wrap">
			<!---start-header---->
			<div class="header">
				<div class="logo">
					<a href="indexfront.html"><img src="images/logo.png" width="300px" height="100px" title="My Natural Beauty" /></a>
				</div>
				<div class="top-social-icons">
					<ul>
						<li><a class="icon1" href="C:\wamp\www\My natural beauty\fullcalendar-1.6.4\fullcalendar-1.6.4\demos\agenda-views.html"target="_blank"> </a></li>
						<li><a class="icon2" href="#"> </a></li>
						<li><a class="icon3" href="#"> </a></li>
						<li><a class="icon4" href="#"> </a></li>
						<?php session_start();		if(isset($_SESSION['login'])) { 	?> <li><a class="deconnect" href="logout.php" ></a></li>  
			  <?php } else { ?> <li><a class="connect" href="log.html" ></a></li> <?php } ?>

					</ul>
				</div>
				<div class="clear"> </div>
			</div>
			<div class="clear"> </div>
			<!---End-header---->
			<!---start-top-nav---->
			<div class="top-nav">
						<ul class="sf-menu sf-menu2" id="example">
							<li  class="current home">
							<a href="indexfront.html" target="_blank"></a>
						</li>
						<li class="active">
							<a href="about.html" target="_blank">A-Propos</a>
						</li>
						<li>
							<a href="afficherFront2.html" target="_blank"> Articles</a>
						
						</li>
						<li>
							<a href="produitp.html" target="_blank">Produits</a>
						</li>
						
						<li>
							<a href="centre.php" target="_blank">Centres</a>
						</li>
						<li>
							<a href="Forum/indexforum.php" target="_blank">Forum</a>
						</li>
						
						<li>
							<a href="inscription.html" target="_blank">Inscription</a>
						</li>
						<div class="clear"> </div>
					</ul>
					</div>
					<div class="clear"> </div>
				</div>
				<!---End-header---->
			<!---start-image-slider---->
			 <div class="slider">
			 	<div class="wrap">
			<div class="fluid_container">
		        <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
		            <div data-thumb="images/slider3.jpg" data-src="images/slider3.jpg">
		                <div class="camera_caption fadeFromBottom">
						 
		                	<h3>Votre visage</h3>
		                    <p>Pourquoi infliger à notre visages des substances chimiques inutiles? Essayez plutôt ces soins à base de produits naturels et efficaces.</p>
		                  
		                </div>
						 <div class="dorra"> </div> 
		            </div>
		           <div data-thumb="images/slider1.jpg" data-src="images/slider1.jpg" div="test">
		                <div class="camera_caption fadeFromBottom">
						
		                	<h3>Votre corps</h3>
		                    <p>Puisez votre beaute dans la nature.Faites rimer beaute, nature et economie pour le bien de votre corps.</p>
		                    
		                </div>
						  <div class="dorra"> </div>
		            </div>
		             <div data-thumb="images/slider2.jpg" data-src="images/slider2.jpg">
		                <div class="camera_caption fadeFromBottom">
						
		                	<h3>Laver sa peau matin et soir</h3>
		                    <p>Il est impératif de nettoyer son visage avec un soin adapté à son type de peau. Le nettoyage débarrasse la peau des impuretés.</p>
		                </div>
						 <div class="dorra"> </div>
		            </div>
		             <div data-thumb="images/slider4.jpg" data-src="images/slider4.jpg">
		                <div class="camera_caption fadeFromBottom">
						
		                	<h3>Soin des mains/pieds</h3>
		                    <p>Vos mains & vos pieds on besoin d'etre bien entretenu pour plaire a votre cheri et pour se sentir belle.</p>
		                    
		                </div>
						 <div class="dorra"> </div>
		            </div>
		            <div data-thumb="images/slider5.jpg" data-src="images/slider5.jpg">
		                <div class="camera_caption fadeFromBottom">
						
		                	<h3>Alimentation</h3>
		                    <p> Il vaut mieux avoir une alimentation saine sur le long terme plutôt que de faire des régimes drastiques par à-coups.</p>
		                    
		                </div>
						 <div class="dorra"> </div>
		            </div>
		            <div data-thumb="images/slider6.jpg" data-src="images/slider6.jpg">
		                <div class="camera_caption fadeFromBottom">
						 
		                	<h3>Vos cheveux</h3>
		                    <p>Preparer vous même des masques de soins pour cheveux. Les ingredients, vous les avez  deja dans votre cuisine.</p>
		                    
		                </div>
						<div class="dorra"> </div>
		            </div>
		        </div><!-- #camera_wrap_1 -->
		        <script type='text/javascript' src='js/jquery.min.js'></script>
			    <script type='text/javascript' src='js/jquery.mobile.customized.min.js'></script>
			    <script type='text/javascript' src='js/jquery.easing.1.3.js'></script> 
			    <script type='text/javascript' src='js/camera.min.js'></script> 
				</div>
       			<div class="clear"> </div>
       			<div class="shadow">
       				<img src="images/shadow.png" alt="" />
       			</div>
			<!---End-image-slider---->
			</div>
			<!---start-content----->
			<div class="content">
				<!---start-top-grids----->
				<div class="top-grids">
					<div class="wrap">
						<div class="top-grid top-grid1">
							<a class="icon01" href="
							http://127.0.0.1/pfc%20final/fullcalendar-1.6.4/fullcalendar-1.6.4/demos/agenda-views.html" target="_blank"> </a>
							<h2><span>Prochain</span>Tirage au sort</h2>
							<p> Natural beauty offre un cadeau pour un de nos chers fans.</p>
						</div>
						<div class="top-grid top-grid2">
							<a class="icon02" href="conceilfront.php" target="_blank"> </a>
							<h2><span>Nos</span>Conseils</h2>
							<p>Oublions les cosmétiques et leurs mal fait, laissez la nature vous tenter.</p>
						</div>
						<div class="top-grid last-grid">
							<a class="icon03" href="solde.html" target="_blank"> </a>
							<h2><span>Produits</span>soldés</h2>
							<p>Soyez les premiéres à en profiter</p>
						</div>
						<div class="clear"> </div>
					</div>
				</div>
				<!---End-top-grids----->
				<!---start-mid-grids----->
				<div class="mid-grids">
					<div class="wrap">
					<div class="mid-grids-head">
						<div class="mid-grids-head-left">
							<h4><span>Nos</span>Articles</h4>
						</div>
						<div class=="clear"> </div>
					</div>
					<div class="mid-grid1 last-grid">
						<div class="mid-grid effect">
							<img src="images/g1.jpg" />
					        <div class="mask">
								<a href="#" class="info">Read More</a>
							</div>
						</div>
					</div>
					<div class="mid-grid1 last-grid">
						<div class="mid-grid effect">
							<img src="images/g2.jpg" />
					        <div class="mask">
								<a href="#" class="info">Read More</a>
							</div>
						</div>
					</div>
					<div class="mid-grid1 last-grid1">
						<div class="mid-grid effect">
							<img src="images/g3.jpg" />
					        <div class="mask">
								<a href="#" class="info">Read More</a>
							</div>
						</div>
					</div>
					<div class="mid-grid1 last-grid">
						<div class="mid-grid effect">
							<img src="images/g4.jpg" />
					        <div class="mask">
								<a href="#" class="info">Read More</a>
							</div>
						</div>
					</div>
					<div class="mid-grid1 last-grid">
						<div class="mid-grid effect">
							<img src="images/g5.jpg" />
					        <div class="mask">
								<a href="#" class="info">Read More</a>
							</div>
						</div>
					</div>
					<div class="mid-grid1 last-grid1">
						<div class="mid-grid effect">
							<img src="images/g6.jpg" />
					        <div class="mask">
								<a href="#" class="info">Read More</a>
							</div>
						</div>
					</div>
					<div class="clear"> </div>
				</div>
				</div>
				<!---End-mid-grids----->
				<!---start-bottom-grids----->
				<br> </br>
				<!--<<div class="bottom-grids">
					<div class="wrap">
					<div class="mid-grids-head">
						<div class="mid-grids-head-left">
							<h4><span>Les</span>Nouveautés</h4>
						</div>
						<div class="=&quot;clear&quot;"> </div>
					</div>
					<div class="bottom-grid-left">
						<div class="bottom-grid-left-grid">
							<div class="bottom-grid-left-grid-pic">
								<img src="images/06.jpg" alt="">
							</div>
							<div class="bottom-grid-left-grid-info">
								<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit,</h3>
								<ul class="in-list">
									<li><a href="#">May 3rd, 2013 |</a></li>
									<li><a href="#">1 Comment</a></li>
								</ul>
								<p>consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<a href="#">[...]</a></p>
							</div>
							<div class="clear"> </div>
						</div>
						<div class="bottom-grid-left-grid">
							<div class="bottom-grid-left-grid-pic">
								<img src="images/07.jpg" alt="">
							</div>
							<div class="bottom-grid-left-grid-info">
								<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit,</h3>
								<ul class="in-list">
									<li><a href="#">May 3rd, 2013 |</a></li>
									<li><a href="#">1 Comment</a></li>
								</ul>
								<p>consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<a href="#">[...]</a></p>
							</div>
							<div class="clear"> </div>
						</div>
						<a class="all" href="#">View all</a>
					</div>
					<div class="bottom-grid-right">
						<iframe src="//player.vimeo.com/video/71543851" width="100%" height="330" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen> </iframe> 
						<a href="#">View all videos</a>
					</div>
					<div class="clear"> </div>
				</div>
			</div>
				<!---End-bottom-grids----->
			</div>
			<!---End-content----->
		</div>
		</div>
		<!---start-footer----->
		<div class="footer">
			<div class="wrap">
				<div class="footer-left">
					<a href="index.html">NATURAL BEAUTY</a>
				</div>
				<div class="footer-right">
					<p>Crée par <a href="http://w3layouts.com/">Shine</a></p>
					<script type="text/javascript">
							$(document).ready(function() {
								/*
								var defaults = {
						  			containerID: 'toTop', // fading element id
									containerHoverID: 'toTopHover', // fading element hover id
									scrollSpeed: 1200,
									easingType: 'linear' 
						 		};
								*/
								
								$().UItoTop({ easingType: 'easeOutQuart' });
								
							});
						</script>
   					 <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
				</div>
				<div class="clear"> </div>
			</div>
		</div>
		<!---End-footer----->
		<!---End-wrap---->
		
	</body>
</html>

