<?php
include_once 'header.php';
include("../inc/koneksi.php");
include("../inc/function.php");
$kategori="";
if(isset($_GET['id'])){
	$sql="select * from tb_hipotesa where id_hipotesa='".$_GET['id']."'";
	$result=mysql_query($sql);
	$data=mysql_fetch_assoc($result);
	$kategori=$data['kategori'];	
}

if(isset($_POST['add_baru'])){

		$keterangan=$_POST['kategori'];
		$sql_s="update tb_hipotesa set kategori='".$keterangan."' where id_hipotesa='".$_GET['id']."'";
		$result_s=mysql_query($sql_s)or die(mysql_error());
		if($result_s){
			$_SESSION ['add']='<div class="alert alert-success"> Data berhasil ditambah </div>';	
		}else{
			$_SESSION ['add']='<div class="alert alert-error"> Data gagal ditambah </div>';	
		}
		
		echo '<script> window.location.href="home.php?list='.$_GET['list'].'" </script>';
}
?>
<html>
<head>
</head>
<body>
<p><strong style="font-size: 20px"> Tambah Data Kategori Hipotesa  <?php echo _tampil_nama_hipotesa($_GET['id']);?></strong>
			<hr>
			</p>
			<br>
			<form class="form-horizontal" id="frm_penyakit" name="frm_penyakit" action="form_kategori.php?list=<?php echo $_GET['list'];?>&id=<?php echo $_GET['id'];?>" method="post">
            	<input type="hidden" name="list" value="<?php echo $_GET['list'];?>" />
                 	<div class="control-group">
        			<label class="control-label"> Kategori </label>
           				<div class="controls"> 
                        <Textarea name="kategori" cols="10" style="width:300px;"><?php echo $kategori;?></Textarea> 
                        </div>
                     </div>
 					<div class="control-group">  
                    	<div class="controls">              
                		<button class="btn btn-primary" name="add_baru">Simpan</button>
    					<a href="home.php?list=<?php echo $_GET['list']?>" class="btn">Kembali</a>
                		</div>
                    </div>
            </form>

</body>
</html>