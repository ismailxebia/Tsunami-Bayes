<?php
include_once 'header.php';
include_once '../inc/function.php';
//include_once 'validasi.php';

//proses simpan data hp baru ke database
if(isset($_POST['add_baru'])){
	//simpan gejala
	if($_POST['list']=="gejala"){
		$nama_gejala=$_POST['nama_gejala'];
		$hasil=_simpan_gejala($nama_gejala);
		if($hasil==0){
			$_SESSION ['add']='<div class="alert alert-success"> Data berhasil ditambah </div>';	
		}else{
			 $_SESSION ['add']='<div class="alert alert-error"> Data gagal ditambah </div>';
		}
		echo '<script> window.location.href="home.php?list='.$_GET['list'].'" </script>';
	}elseif($_POST['list']=="hipotesa"){
		$nama_hipotesa=$_POST['nama_hipotesa'];
		$hasil=_simpan_hipotesa($nama_hipotesa);
		if($hasil==0){
			$_SESSION ['add']='<div class="alert alert-success"> Data berhasil ditambah </div>';
		}else{
			 $_SESSION ['add']='<div class="alert alert-error"> Data gagal ditambah </div>';
		}
		echo '<script> window.location.href="home.php?list='.$_GET['list'].'" </script>';
	}elseif($_POST['list']=="rule"){
		$keterangan=$_POST['keterangan'];
		$jika_ya=$_POST['jika_ya'];
		$jika_tidak=$_POST['jika_tidak'];
		$mulai=$_POST['mulai'];
		$selesai=$_POST['seleasi'];
		$nilai_bayes=$_POST['nilai_bayes'];
		
		$hasil=_simpan_rule($keterangan,$jika_ya,$jika_tidak,$mulai,$selesai,$nilai_bayes);
		if($hasil==0){
			$_SESSION ['add']='<div class="alert alert-success"> Data berhasil ditambah </div>';
		}else{
			 $_SESSION ['add']='<div class="alert alert-error"> Data gagal ditambah </div>';
		}
		echo '<script> window.location.href="home.php?list='.$_GET['list'].'" </script>';
		
	}elseif($_POST['list']=="admin"){
		$email=$_POST['email'];
		$password=$_POST['password'];
		$nama_lengkap=$_POST['nama_lengkap'];
		$hasil=_simpan_admin($email,$password,$nama_lengkap);
		if($hasil==0){
			$_SESSION ['add']='<div class="alert alert-success"> Data berhasil ditambah </div>';
		}else{
			 $_SESSION ['add']='<div class="alert alert-error"> Data gagal ditambah </div>';
		}
		echo '<script> window.location.href="home.php?list='.$_GET['list'].'" </script>';
			
	}
}
    //ambil semua data
    
?>
<html>
<head>
</head>
<body>
<div class="span10">
<?php
	if(isset($_GET['list'])){
		if($_GET['list']=="gejala"){
?>
			<p><strong style="font-size: 20px"> Tambah Gejala </strong>
			<hr>
			</p>
			<br>
			<form class="form-horizontal" id="frm_gejala" name="frm_gejala" action="form.php?list=<?php echo $_GET['list'];?>" method="post">
            	<input type="hidden" name="list" value="<?php echo $_GET['list'];?>" />
                 	<div class="control-group">
        			<label class="control-label"> Nama Gejala </label>
           				<div class="controls"> 
                        <input type="text" name="nama_gejala"> 
                        </div>
                     </div>
 					<div class="control-group">  
                    	<div class="controls">              
                		<button class="btn btn-primary" name="add_baru">Tambah</button>
    					<a href="home.php?list=<?php echo $_GET['list']?>" class="btn">Kembali</a>
                		</div>
                    </div>
            </form>

<?php		
		}elseif($_GET['list']=="hipotesa"){
?>
			<p><strong style="font-size: 20px"> Tambah Data Hipotesa </strong>
			<hr>
			</p>
			<br>
			<form class="form-horizontal" id="frm_penyakit" name="frm_hipotesa" action="form.php?list=<?php echo $_GET['list'];?>" method="post">
            	<input type="hidden" name="list" value="<?php echo $_GET['list'];?>" />
                 	<div class="control-group">
        			<label class="control-label"> Nama Hipotesa </label>
           				<div class="controls"> 
                        <Textarea name="nama_hipotesa" cols="5" style="width:300px;"></Textarea> 
                        </div>
                     </div>
 					<div class="control-group">  
                    	<div class="controls">              
                		<button class="btn btn-primary" name="add_baru">Tambah</button>
    					<a href="home.php?list=<?php echo $_GET['list']?>" class="btn">Kembali</a>
                		</div>
                    </div>
            </form>
<?php
		}elseif($_GET['list']=="rule"){
?>
			<p><strong style="font-size: 20px"> Tambah Diagnosa </strong>
			<hr>
			</p>
			<br>
            <form class="form-horizontal" id="frm_rule" name="frm_rule" action="form.php?list=<?php echo $_GET['list'];?>" method="post">
            	
            
			</form>
<?php
		}elseif($_GET['list']=="aturan"){
?>
		<p><strong style="font-size: 20px"> Tambah Admin </strong>
			<hr>
			</p>
			<br>
            <form class="form-horizontal" id="frm_aturan" name="frm_aturan" action="form.php?list=<?php echo $_GET['list'];?>" method="post">
            	
            </form>

<?php
		}elseif($_GET['list']=="admin"){
?>
			<p><strong style="font-size: 20px"> Tambah Admin </strong>
			<hr>
			</p>
			<br>
			<form class="form-horizontal" id="frm_admin" name="frm_admin" action="form.php?list=<?php echo $_GET['list'];?>" method="post">
            	<input type="hidden" name="list" value="<?php echo $_GET['list'];?>" />
                 	<div class="control-group">
        			<label class="control-label"> Email </label>
           				<div class="controls"> 
                        <input type="email" name="email" value=""> 
                        </div>
                     </div>
                     <div class="control-group">
                     <label class="control-label">Password</label>
                     	<div class="controls">
                        <input type="password" name="password" value="" />
                        </div>
                     </div>
                     <div class="control-group">
                     <label class="control-label">Nama Lengkap</label>
                     	<div class="controls">
                        <input type="text" name="nama_lengkap" value="" />
                        </div>
                     </div>
                     
 					<div class="control-group">  
                    	<div class="controls">              
                		<button class="btn btn-primary" name="add_baru">Tambah</button>
    					<a href="home.php?list=<?php echo $_GET['list']?>" class="btn">Kembali</a>
                		</div>
                    </div>
            </form>
		

<?php
		}
	}
?>
</div>
</body>
<style>
    span {
        float: left;
        width: 100px;
    }
</style>

<?php
include_once 'footer.php';
?>

</html>