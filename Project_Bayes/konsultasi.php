<?php
	include("inc/koneksi.php")
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Konsultasi</title>
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/konsul.css" />
		<link rel="stylesheet" type="text/css" href="css/xebiastyle.css" />
		<script src="js/modernizr.custom.js"></script>
        <script src="script.js"></script>
	</head>
	<body>
		<div class="container">
			<!-- Top Navigation -->
			
			<section>
            
            <?php
			if(!isset($_GET['id_gejala'])){
			$sql="select * from tb_gejala where mulai='Y'";
			$result=mysql_query($sql);
			$data=mysql_fetch_array($result);
			
				echo "<form class='ac-custom ac-radio ac-circle' autocomplete='off'>";
					echo "<h2>Apakah ".$data['nama_gejala']."?</h2>";
					echo "<ul>";
					echo "<li><input name='id_gejala' value='".$data['jika_ya']."' type='radio'><label for='id_gejala'>Benar</label></li>";
					
					echo "<li><input name='id_gejala' value='".$data['jika_tidak']."' type='radio'><label for='id_gejala'>Tidak</label></li>";
					echo "</ul>";
					echo "<input type='submit' id='submit' value='Lanjut ' >";
					
					}else{
						$idsolusi=$_GET['id_gejala'];
						$sqlp = "select * from tb_gejala where id_gejala='".$idsolusi."'";
						$rs=mysql_query($sqlp);
						$data=mysql_fetch_array($rs);
						
						echo "<form class='ac-custom ac-radio ac-circle' autocomplete='off'>";
						echo "<h2>Apakah ".$data['nama_gejala']."?</h2>";
						if(ereg("P",$_GET['id_gejala'])){
						echo '<script> window.location.href="hasil.php?id='.$_GET['id_gejala'].'" </script>';
						echo "<a href='konsultasi.php' class='btn  btn-block btn-large' /> <H1>Kembali Melakukan Diagnosa</H1> </a>";
					}else{
						echo "<ul>";
						echo "<li><input name='id_gejala' value='".$data['jika_ya']."' type='radio'><label for='id_gejala'>Benar</label></li>";
						echo "<li><input name='id_gejala' value='".$data['jika_tidak']."' type='radio'><label for='id_gejala'>Tidak</label></li>";
						echo "</ul>";
						if(ereg("Z",$_GET['id_gejala'])){
						echo '<script> window.location.href="hasil1.php?id='.$_GET['id_gejala'].'" </script>';
						echo "<a href='konsultasi.php' class='btn  btn-block btn-large' /> <H1>Kembali Melakukan Diagnosa</H1> </a>";}
						echo "<input type='submit' id='submit' value='Lanjut ' >";
						}
					}
				echo "</form>";
			?>
			</section>
		</div><!-- /container -->
		<script src="js/svgcheckbx.js"></script>
	</body>
</html>