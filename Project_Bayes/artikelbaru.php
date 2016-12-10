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
     <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
</head>
<body>
<div class="background">
</div>
<article class="wrapper">
<center><a href="index.php" class="btn  btn-block btn-large" style="align-content:center" /><img src="img/icon/home.png"></a>
<header>
    <h2 class="pageSubTitle"><center>Metode Perhitungan</h2>
</header>
<section>
<p>Secara umum, sistem pakar adalah sistem yang berusaha mengadopsi pengetahuan manusia ke komputer yang dirancang untuk memodelkan kemampuan menyelesaikan masalah seperti layaknya seorang pakar. Dalam penyusunannya, sistem pakar mengkombinasikan kaidah-kaidah penarikan kesimpulan (inference rules) dengan basis pengetahuan tertentu yang  diberikan oleh satu atau lebih pakar dalam bidang tertentu. Kombinasi dari kedua hal tersebut disimpan dalam komputer, yang selanjutnya digunakan dalam proses pengambilan keputusan untuk penyelesaian masalah tertentu.</p>
        <p>Dalam teori probabilitas dan statistika, teorema Bayes adalah sebuah teorema dengan dua penafsiran berbeda. Dalam penafsiran Bayes, teorema ini menyatakan seberapa jauh derajat kepercayaan subjektif harus berubah secara rasional ketika ada petunjuk baru. Dalam penafsiran frekuentis teorema ini menjelaskan representasi invers probabilitas dua kejadian. Teorema ini merupakan dasar dari statistika Bayes dan memiliki penerapan dalam sains, rekayasa, ilmu ekonomi (terutama ilmu ekonomi mikro), teori permainan, kedokteran dan hukum. Penerapan teorema Bayes untuk memperbarui kepercayaan dinamakan inferens Bayes..</p>
        </section>
</article>

<article class="wrapper">
<header>
    <h2 class="pageSubTitle"><center> Tsunami </h2>
</header>
<section>
<p align="center">Tsunami (bahasa Jepang: 津波; tsu = pelabuhan, nami = gelombang, secara harafiah berarti "ombak besar di pelabuhan") adalah perpindahan badan air yang disebabkan oleh perubahan permukaan laut secara vertikal dengan tiba-tiba. Perubahan permukaan laut tersebut bisa disebabkan oleh gempa bumi yang berpusat di bawah laut, letusan gunung berapi bawah laut, longsor bawah laut, atau atau hantaman meteor di laut. Gelombang tsunami dapat merambat ke segala arah. Tenaga yang dikandung dalam gelombang tsunami adalah tetap terhadap fungsi ketinggian dan kelajuannya. Di laut dalam, gelombang tsunami dapat merambat dengan kecepatan 500–1000 km per jam. Setara dengan kecepatan pesawat terbang. Ketinggian gelombang di laut dalam hanya sekitar 1 meter. Dengan demikian, laju gelombang tidak terasa oleh kapal yang sedang berada di tengah laut. Ketika mendekati pantai, kecepatan gelombang tsunami menurun hingga sekitar 30 km per jam, namun ketinggiannya sudah meningkat hingga mencapai puluhan meter. Hantaman gelombang Tsunami bisa masuk hingga puluhan kilometer dari bibir pantai. Kerusakan dan korban jiwa yang terjadi karena Tsunami bisa diakibatkan karena hantaman air maupun material yang terbawa oleh aliran gelombang tsunami.</p>

<p align="center">Dampak negatif yang diakibatkan tsunami adalah merusak apa saja yang dilaluinya. Bangunan, tumbuh-tumbuhan, dan mengakibatkan korban jiwa manusia serta menyebabkan genangan, pencemaran air asin lahan pertanian, tanah, dan air bersih.</p>

<p align="center">Sejarawan Yunani bernama Thucydides merupakan orang pertama yang mengaitkan tsunami dengan gempa bawah laut. Namun hingga abad ke-20, pengetahuan mengenai penyebab tsunami masih sangat minim. Penelitian masih terus dilakukan untuk memahami penyebab tsunami.
geologi, geografi, dan oseanografi pada masa lalu menyebut tsunami sebagai "gelombang laut seismik".</p>

<table style="width:100%; align-content:center" >
                               		<thead align="left" bgcolor="#79F5F3">
                                    	<tr>
                                        	<th>ID</th>
                                            <th>Nama Hipotesa</th>
 
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
											$param="P";
            								$sql = mysql_query("SELECT * FROM tb_hipotesa where id_hipotesa LIKE'%".$param."%'");
            								while($rows = mysql_fetch_array($sql)){            
            							?>
         								<tr>
         									<td><?php echo $rows['id_hipotesa'];?></td>
         									<td><?php echo $rows['nama_hipotesa'];?></td>
        								</tr>     
        								<?php } ?>
                                    </tbody>
                               </table>
 <p align="center">Tsunami dalam sejarah
1 November 1755 - Tsunami menghancurkan Lisboa, ibu kota Portugal, dan menelan 60.000 korban jiwa.
1883 - Pada tanggal 26 Agustus, letusan gunung Krakatau dan tsunami menewaskan lebih dari 36.000 jiwa.
2004 - Pada tanggal 26 Desember 2004, gempa besar yang menimbulkan tsunami menelan korban jiwa lebih dari 250.000 di Asia Selatan, Asia Tenggara dan Afrika. Ketinggian tsunami 35 m,
2006 - 17 Juli, Gempa yang menyebabkan tsunami terjadi di selatan pulau Jawa, Indonesia, dan setinggi maksimum ditemukan 21 meter di Pulau Nusakambangan. Memakan korban jiwa lebih dari 500 orang. Dan berasal dari selatan kota Ciamis</p>
<p align="center">
<br>2007 - 12 September, Bengkulu, Memakan korban jiwa 3 orang. Ketinggian tsunami 3–4 m.
<br>2010 - 27 Februari, Santiago, Chili
<br>2010 - 26 Oktober, Kepulauan Mentawai, Indonesia
<br>2011 - 11 Maret, Sendai, Jepang</p></br>
 </section>
</article>
</body>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</html>