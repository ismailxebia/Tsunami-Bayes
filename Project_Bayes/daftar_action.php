<?php
session_start();
include("inc/koneksi.php");
include("inc/function.php");

if(isset($_POST)){
	$email=$_POST['email'];
	$password=$_POST['password'];
	$nama_lengkap=$_POST['nama_lengkap'];
	//cek email
	$respon_email=_cek_email($email);
	if($respon_email==1){
				$respon=_simpan_daftar($email,$password,$nama_lengkap,"T");
				if($respon==0){
					?><script language="javascript">
						alert("Register gagal, silahkan coba lagi");
						document.location="daftar_action.php";
			</script><?php
						header('location:login.php');
				}else{
					?><script language="javascript">
						alert("Register berhasil!");
						document.location="daftar_action.php";
						</script><?php
							header('location:index.php');
	}
	}else{
		?><script language="javascript">
						alert("Email sudah terdaftar, silahkan coba dengan email yang berbeda");
						document.location="daftar_action.php";
			</script><?php
						header('location:index.php');	
	}
}
?>