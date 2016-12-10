<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.3.0.60745 -->
    <meta charset="utf-8">
    <title>Sistem Pakar Tsunami</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
    <link rel="stylesheet" type="text/css" href="css/xebia2.css"/>
    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>

</head>
<body>
<div class="background">
</div>
<div id="art-main">
<nav class="art-nav">
<?php
	include("inc/koneksi.php");
	include("inc/function.php");
?>
</nav>
</div>
<?php
$hipotesa=_tampil_nama_hipotesa($_GET['id']);
$gejala=_tampil_gejala($_GET['id']);
$nilai_bayes=_hit_bayes($_GET['id']);
?>
<article class="wrapper">
<header>
    <h1 class="pageTitle"><center>HASIL DIAGNOSA</h1>
    <h2 class="pageSubTitle"><center><?php echo $hipotesa;?></h2>
</header>
<div class="container">
<center>
</br><div class="well">
	<table style="border:none;">
    	<tr>
        <td colspan="2" height="10px" style="border:none; margin-bottom:30px; ">
	Dari gejala yang anda pilih sebelumnya dapat kami simpulkan bahwa
    	</td>
        </tr>    
     <tr>
    	<td colspan="2" height="10px" style="border:none;"></td>
    </tr>
    <?php 
	$jml=COUNT($gejala);	
	for($i=0;$i<$jml;$i++){;?>
     <tr>
    	<td height="20px" style="width:10px; border:none;"> - </td>
        <td height="20px" style="border:none;"><b><?php echo _tampil_nama_gejala($gejala[$i]);?></b></td>
        </tr>
	<?php };?>
    <tr>
    	<td colspan="2" height="40px" style="border:none;"></td>
    </tr>
    <tr>
    	<td colspan="2" height="10px" style="border:none; color:#9F9898; font-size:18px"><center>Nilai Bayes : </font></td>
    </tr>
    <tr>
    	<td colspan="2" height="15px" style="border:none; font-size:24px"><center><?php echo $nilai_bayes;?></center></font></td>
    </tr>
    
    <tr>
    	<td colspan="2" height="40px" style="border:none;"></td>
    </tr>
    
    <tr>
    	<td colspan="2" height="35px" style="border:none;"><center><a href='action_hasil.php?id=<?php echo  $_GET['id'];?>&nilai=<?php echo $nilai_bayes;?>' class='btn  btn-block btn-large' /><img src="img/icon/save20.png"></a></td>
    </tr>
    <tr>
    	<td colspan="2" height="15px" style="border:none;"><center><a href='index.php' class='btn  btn-block btn-large' /><img src="img/icon/home.png"></a></td>
    </tr>
    
        <tr>
    	<td colspan="2" height="40px" style="border:none;"></td>
    </tr>
    </table>
</div>	
</div>
</article>

<span class="credits">(Thanks for showing the better approach <a href="http://codepen.io/perry_nt">@ismail.xebia</a>, </span>
 <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/indexhasil.js"></script>
</body>
</html>