<?php
	include("inc/koneksi.php");
	include("inc/function.php");
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.3.0.60745 -->
    <meta charset="utf-8">
    <title>Sistem Pakar Tsunami</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="style.responsive.css" media="all">


    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>



</head>
<body>
<div id="art-main">
<?php
	include("menu.php");
?>
<header class="art-header">

    <div class="art-shapes">
        <div class="art-object0"></div>

            </div>

<h1 class="art-headline">
    <a href="/">Sistem Pakar Tsunami</a>
</h1>
<h2 class="art-slogan"></h2>





                        
                    
</header>
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
                                <h2 class="art-postheader">Tsunami</h2>
                                                
                                <div class="art-postcontent art-postcontent-0 clearfix"><p><br/></p></div>
                                <p>Tsunami (bahasa Jepang: 津波; tsu = pelabuhan, nami = gelombang, secara harafiah berarti "ombak besar di pelabuhan") adalah perpindahan badan air yang disebabkan oleh perubahan permukaan laut secara vertikal dengan tiba-tiba. Perubahan permukaan laut tersebut bisa disebabkan oleh gempa bumi yang berpusat di bawah laut, letusan gunung berapi bawah laut, longsor bawah laut, atau atau hantaman meteor di laut. Gelombang tsunami dapat merambat ke segala arah. Tenaga yang dikandung dalam gelombang tsunami adalah tetap terhadap fungsi ketinggian dan kelajuannya. Di laut dalam, gelombang tsunami dapat merambat dengan kecepatan 500–1000 km per jam. Setara dengan kecepatan pesawat terbang. Ketinggian gelombang di laut dalam hanya sekitar 1 meter. Dengan demikian, laju gelombang tidak terasa oleh kapal yang sedang berada di tengah laut. Ketika mendekati pantai, kecepatan gelombang tsunami menurun hingga sekitar 30 km per jam, namun ketinggiannya sudah meningkat hingga mencapai puluhan meter. Hantaman gelombang Tsunami bisa masuk hingga puluhan kilometer dari bibir pantai. Kerusakan dan korban jiwa yang terjadi karena Tsunami bisa diakibatkan karena hantaman air maupun material yang terbawa oleh aliran gelombang tsunami.

Dampak negatif yang diakibatkan tsunami adalah merusak apa saja yang dilaluinya. Bangunan, tumbuh-tumbuhan, dan mengakibatkan korban jiwa manusia serta menyebabkan genangan, pencemaran air asin lahan pertanian, tanah, dan air bersih.

Sejarawan Yunani bernama Thucydides merupakan orang pertama yang mengaitkan tsunami dengan gempa bawah laut. Namun hingga abad ke-20, pengetahuan mengenai penyebab tsunami masih sangat minim. Penelitian masih terus dilakukan untuk memahami penyebab tsunami.

geologi, geografi, dan oseanografi pada masa lalu menyebut tsunami sebagai "gelombang laut seismik".</p>
<div class="art-postcontent art-postcontent-0 clearfix"><p><br/></p></div>
                               <table style="width:100%;">
                               		<thead>
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
                <br>
<p>Tsunami dalam sejarah
1 November 1755 - Tsunami menghancurkan Lisboa, ibu kota Portugal, dan menelan 60.000 korban jiwa.
1883 - Pada tanggal 26 Agustus, letusan gunung Krakatau dan tsunami menewaskan lebih dari 36.000 jiwa.
2004 - Pada tanggal 26 Desember 2004, gempa besar yang menimbulkan tsunami menelan korban jiwa lebih dari 250.000 di Asia Selatan, Asia Tenggara dan Afrika. Ketinggian tsunami 35 m,
2006 - 17 Juli, Gempa yang menyebabkan tsunami terjadi di selatan pulau Jawa, Indonesia, dan setinggi maksimum ditemukan 21 meter di Pulau Nusakambangan. Memakan korban jiwa lebih dari 500 orang. Dan berasal dari selatan kota Ciamis
2007 - 12 September, Bengkulu, Memakan korban jiwa 3 orang. Ketinggian tsunami 3–4 m.
2010 - 27 Februari, Santiago, Chili
2010 - 26 Oktober, Kepulauan Mentawai, Indonesia
2011 - 11 Maret, Sendai, Jepang</p></br>
</article></div>
                        <div class="art-layout-cell art-sidebar1"><div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Follow US</h3>
        </div>
        <div class="art-blockcontent"><p><img width="60" height="60" alt="" src="">&nbsp;<img width="60" height="60" alt="" src="images/facebook-2.png" class="">&nbsp;<img width="60" height="60" alt="" src="images/twitter-2.png">&nbsp;<img width="60" height="60" alt="" src="images/youtube-2.png" class=""></p></div>
</div><div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Featured Photo</h3>
        </div>
        <div class="art-blockcontent"><p><img width="253" height="168" alt="" src="" class=""></p></div>
</div><div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Featured Video</h3>
        </div>
        <div class="art-blockcontent"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="253" height="214"><param name="allowFullScreen" value="true">
<param name="allowscriptaccess" value="always">
<param name="movie" value="http://www.youtube.com/v/89kKUeT2sxk">
<!--[if !IE]>          --><object type="application/x-shockwave-flash" data="http://www.youtube.com/v/89kKUeT2sxk" width="253" height="214"><param name="allowFullScreen" value="true">
<param name="allowscriptaccess" value="always">
<!--<![endif]          --><a href="http://www.adobe.com/go/getflashplayer"><img src="" alt="Get Adobe Flash player"></a><!--[if !IE]>          --></object> <!--<![endif]          --></object></div>
</div></div>
                    </div>
                </div>
            </div>
    </div>
<footer class="art-footer">
  <div class="art-footer-inner">
<p><a href="#">Privacy Policy</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">TOS</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Feedback</a></p>
<br>
<p>Copyright © 2016. All Rights Reserved.&nbsp;</p>
<br>
<br>
    <p class="art-page-footer">
    </p>
  </div>
</footer>

</div>


</body></html>