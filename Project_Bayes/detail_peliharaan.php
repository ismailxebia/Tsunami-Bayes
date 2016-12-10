<?php
	include("inc/koneksi.php")
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
    
    <script language="JavaScript" type="text/javascript">
    function checkform ( form )
    {
      if (form.nama_peliharaan.value == "") {
        alert( "Maaf, Nama peliharaan tidak boleh dikosongkan.!!" );
        form.nama_peliharaan.focus();
        return false ;
      }
      else if (form.jenis.value == "") {
        alert( "Maaf, Jenis tidak boleh dikosongkan.!!" );
        form.jenis.focus();
        return false ;
      }
	  else if(form.umur.value==""){
			alert("Maaf, Umur tidak boleh kosong.!!");
			form.umur.focus();
			return false;  
	  }
	  else if(form.berat.value==""){
			alert("Maaf, berat tidak boleh kosong.!!");
			form.berat.focus();
			return false;  
	  }
      return true ;
    }
</script>

<style type="text/css">
   .left    { 
   text-align: left;
   font-size:16px;
   margin-left:100px;
   }
   .gejala{
	text-align:left;
	font-size:12px;
	margin-left:200px;   
   }
   .right   { text-align: right;}
   .center  { text-align: center;}
   .justify { text-align: justify;}
</style>

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
                                
                                
                                                
                                <div class="art-postcontent art-postcontent-0 clearfix"><p>
                                <div style="margin-left:20%;">
                              <form action="konsultasi.php" method="post" onsubmit="return checkform(this);">
			<h2>Profile Anjing Peliharaan</h2><hr/>		
			
			<label>Nama peliharaan :</label>
			<input id="nama_peliharaan" name="nama_peliharaan" placeholder="Nama anjing peliharaan" type="text">
            
            <label>Jenis :</label>
			<input id="jenis" name="jenis" placeholder="Jenis" type="text">
			
			<label>Umur :</label>
			<input id="umur" name="umur" placeholder="Umur" type="number" maxlength="2">
            
            <label>Berat :</label>
			<input id="berat" name="berat" placeholder="Berat" type="text" maxlength="5" style="width:200px;">
            
            
            <input type='submit' class='btn btn-primary btn-block btn-large' value='Lanjut ' >
		  </form>
                             
                             </div>   
                                <br/></p></div>
                                
                

</article></div>
                        <div class="art-layout-cell art-sidebar1"><div class="art-block clearfix">
        </div>
        </div>
        </div>
        </div>
    </div>
<footer class="art-footer">
  <div class="art-footer-inner">
<p><a href="#">Privacy Policy</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">TOS</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Feedback</a></p>
<br>
<p>Copyright © 2015. All Rights Reserved.&nbsp;</p>
<br>
<br>
    <p class="art-page-footer">
        <span id="art-footnote-links"><a href="http://www.artisteer.com/" target="_blank">Web Template</a> created with Artisteer.</span>
    </p>
  </div>
</footer>

</div>


</body></html>