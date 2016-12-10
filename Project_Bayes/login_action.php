<?php
session_start();
include("inc/koneksi.php");
include("inc/function.php");

if(isset($_POST)){
	
	$email=$_POST['email'];
	$password=$_POST['password'];
	$respon=_cek_login($email,$password);
	if($respon==0 || $respon==2){
		//login gagal
			?><script language="javascript">
			alert("Login gagal");
			document.location="index.php";
			</script><?php
						//header('location:login.php');
	}else if($respon==1){
		?><script language="javascript">
			alert("Login berhasil");
			document.location="index.php";
			</script><?php
						//header('location:index.php');	
	}
	
}
?>