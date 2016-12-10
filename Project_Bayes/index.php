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
    <link rel="stylesheet" href="css/xebiastyle.css"/>
  	<link rel="stylesheet" type="text/css" href="css/content.css"/>
    <script src="js/modernizr.custom.js"></script>
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
     
        
</head>

<body class="demo-1">
	<div class="image-preload">
		<img src="img/drop-color.png" alt="">
		<img src="img/drop-alpha.png" alt="">
		<img src="img/weather/texture-rain-bg.jpg" />
		<img src="img/weather/texture-rain-bg.png" />
	</div>
	<div class="container">
		<header class="codrops-header">
        	<?php 
			if(isset($_SESSION['s_id_user'])){
			if(empty($_SESSION['s_id_user'])){;?>
			<h1>KELOMPOK 4</h1>
            <?php	}else{?>
            <h1>Selamat Datang <?php echo $_SESSION['s_nama_lengkap'];?></h1>
            <nav class="codrops-demos">
            	<a href="riwayat_konsultasi.php">RIWAYAT</a>
				<a href="artikelbaru.php">TENTANG</a>
				<a href="logout_action.php">LOGOUT</a>
			</nav>
            <?php   }
	  		}else{?>
       		<h1>KELOMPOK 4</h1>
       		<?php };?>
		</header>
		<div class="slideshow">
			<canvas width="1" height="1" id="container" style="position:absolute"></canvas>
			<!-- Heavy rain -->
			<div class="slide"data-weather="rain">
				<div class="slide__element slide__element--date">SISTEM PAKAR METODE BAYES</div>
				<div class="slide__element slide__element--temp">TSUNAMI</div>
			</div>
            <?php 
			if(isset($_SESSION['s_id_user'])){
			if(empty($_SESSION['s_id_user'])){;?>      
            <?php include("form.php"); ?>
            <?php	}else{?>
            <section>
            <nav class="slideshow__nav">
			<div class="xebia-action">
            <a href="konsultasi.php" class="btn" data-type="modal-trigger">DIAGNOSA</a>
        	</div>
            </nav>
            </section>
            <?php   }
	  		}else{?>
            <?php include("form.php"); ?>
            <?php };?>
		</div>
		<p class="nosupport">Sorry, but your browser does not support WebGL!</p>
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
