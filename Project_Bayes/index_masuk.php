<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TSUNAMI</title>
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/normalize.css"/>
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/demo.css"/>
	<link rel="stylesheet" type="text/css" href="css/style1.css"/>
    <link rel="stylesheet" href="css/xebiamorph.css"/>
    <link rel="stylesheet" type="text/css" href="css/xebiastyle.css"/>
  	<link rel="stylesheet" type="text/css" href="css/content.css"/>
    <style type="text/css">
	p #diagnosa{
	position: relative;
	border: none;
	background-color:#FFFFFF;
	color: #000000;
	width: 130px;
	height: 40px;
	text-transform: uppercase;
	letter-spacing: 1px;
	border-radius: 5em;
	font-weight: 600;
	line-height: 10px;
	overflow: hidden;
}
</style>
    <script src="js/modernizr.custom.js"></script>
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->        
</head>
<body class="demo-1">
	<div class="image-preload">
		<img src="img/drop-color.png" alt="">
		<img src="img/drop-alpha.png" alt="">
		<img src="img/weather/texture-rain-fg.png" />
		<img src="img/weather/texture-rain-bg.png" />
	</div>
    <?php 
		if(isset($_SESSION['s_id_user'])){
					if(empty($_SESSION['s_id_user'])){;?>
                    <?php }else{;?>
	<div class="container">
		<header class="codrops-header">
			<h1>Selamat Datang <?php echo $_SESSION['s_nama_lengkap'];?></h1>
			<nav class="codrops-demos">
				<a href="index2.html">TENTANG</a>
				<a href="logout_action.php">LOGOUT</a>
			</nav>
		</header>
		<div class="slideshow">
			<canvas width="1" height="1" id="container" style="position:absolute"></canvas>
			<!-- Heavy rain -->
			<div class="slide" data-weather="storm">
				<div class="slide__element slide__element--date">SISTEM PAKAR METODE BAYES</div>
				<div class="slide__element slide__element--temp">TSUNAMI</div>
			</div>       
			<section>
            <nav class="slideshow__nav">
						<p id="diagnosa"><a href="konsultasi.php">KONSULTASI</a></p>
                    </nav>
                    <?php }
		}else{;?>
			<h2 style="text-align: center;">Register / Login</h2>
        	<p style="text-align: center;">Silahkan Login untuk dapat berkonsultasi</p>
        	<p style="text-align: center;"><a href="index_masuk.php" class="art-button">Masuk</a></p>
		<?php };?>
			</section>
		</div>
		<p class="nosupport">Maaf Browser anda tidak support</p>
	</div>
</div>
         
	<!-- /container -->
	<script src="js/index.min.js"></script>
    <script src="js/classie.js"></script>
		<script src="js/uiMorphingButton_fixed.js"></script>
		<script>
			(function() {
				var docElem = window.document.documentElement, didScroll, scrollPosition;

				// trick to prevent scrolling when opening/closing button
				function noScrollFn() {
					window.scrollTo( scrollPosition ? scrollPosition.x : 0, scrollPosition ? scrollPosition.y : 0 );
				}

				function noScroll() {
					window.removeEventListener( 'scroll', scrollHandler );
					window.addEventListener( 'scroll', noScrollFn );
				}

				function scrollFn() {
					window.addEventListener( 'scroll', scrollHandler );
				}

				function canScroll() {
					window.removeEventListener( 'scroll', noScrollFn );
					scrollFn();
				}

				function scrollHandler() {
					if( !didScroll ) {
						didScroll = true;
						setTimeout( function() { scrollPage(); }, 60 );
					}
				};

				function scrollPage() {
					scrollPosition = { x : window.pageXOffset || docElem.scrollLeft, y : window.pageYOffset || docElem.scrollTop };
					didScroll = false;
				};

				scrollFn();

				[].slice.call( document.querySelectorAll( '.morph-button' ) ).forEach( function( bttn ) {
					new UIMorphingButton( bttn, {
						closeEl : '.icon-close',
						onBeforeOpen : function() {
							// don't allow to scroll
							noScroll();
						},
						onAfterOpen : function() {
							// can scroll again
							canScroll();
						},
						onBeforeClose : function() {
							// don't allow to scroll
							noScroll();
						},
						onAfterClose : function() {
							// can scroll again
							canScroll();
						}
					} );
				} );

				// for demo purposes only
				[].slice.call( document.querySelectorAll( 'form button' ) ).forEach( function( bttn ) { 
					bttn.addEventListener( 'click', function( ev ) { ev.preventDefault(); } );
				} );
			})();
		</script>
</body>

</html>
