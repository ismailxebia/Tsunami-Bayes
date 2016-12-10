<?php
	include("inc/koneksi.php");
	include("inc/function.php");
?>
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
<body style="background:#E9E8E8">
<article class="wrapper">
<center><a href="index.php" class="btn  btn-block btn-large" style="align-content:center" /><img src="img/icon/home.png"></a>
<header>
    <h1 class="pageTitle"><center>HASIL DIAGNOSA</h1>
    <h2 class="pageSubTitle"><center><?php echo $hipotesa;?></h2>
</header>
                               <table style="width:100%;">
                               		<thead style="background:#8AFFC3">
                                    	<tr>
                                        	<th>No.</th>
                                            <th>Tanggal</th>
                                            <th>Hasil Konsultasi</th>
                                            <th>Nilai Bayes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
											$no=0;
            								$sql = mysql_query("SELECT * FROM tb_sispak where id_user ='".$_SESSION['s_id_user']."' order by id_sispak DESC");
            								while($rows = mysql_fetch_array($sql)){
												$no++;            
            							?>
         								<tr>
                                        	<td><?php echo $no;?></td>
         									<td><?php echo tampil_tanggal($rows['tanggal']);?></td>
         									<td><?php echo _tampil_nama_hipotesa($rows['id_hipotesa']);?></td>
            								<td><?php echo $rows['nilai_bayes'];?></td>
        								</tr>     
        								<?php } ?>
                                    </tbody>
                               </table>
               
</article>

</body></html>