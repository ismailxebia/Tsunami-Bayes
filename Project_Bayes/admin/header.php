<?php 
//pemanggilan koneksi.php
include_once '../inc/koneksi.php';
include_once 'login.php';
//session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap-wysihtml5-0.0.2.css">
        <link rel="stylesheet" type="text/css" href="../css/datepicker.css">
        <link rel="stylesheet" type="text/css" href="../css/docs.css">
        <script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="../js/bootstrap.js"></script>
        <script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="../js/wysihtml5-0.3.0_rc2.min.js"></script>
        <script type="text/javascript" src="../js/bootstrap-wysihtml5-0.0.2.min.js"></script>
        <title>Halaman Pakar</title>
    </head>
    <body>
        
<!--header logo-->
<div class="headeradmin">
    <p class="headeradmins2">ADMINISTRATOR<br></p>
    <p class="headeradmins">Sistem Pakar Tsunami</p>
</div>
<!--~~~~~~~~~~~-->

<div class="container wrap">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="navbar navbar-inverse">
                    <div class="navbar-inner">
                        <div class="nav-collapse collapse">
                            <ul class="nav">
				
                                <li  <?php echo ($_SERVER['REQUEST_URI'] == '/pakar/admin/index.php')?'class="active"':'';?>><a href="index.php">Home</i></a></li> 
                               
                                <li> <a href="../index.php" target="_blank">View Web</a></li>
                            </ul>
                        </div>
                        <ul class="nav pull-right">
                            <li><a href="logout.php">Keluar</a></li>
                        </ul>
                    </div><!-- navbar-inner -->
                </div><!-- navbar-inverse -->
            </div><!-- span12-->
        </div><!-- row  fluid-->