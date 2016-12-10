<?php
include_once 'header.php';
include_once '../inc/function.php';

if(isset($_POST['update'])){
	//update gejala
	if($_POST['list']=="gejala"){
		$id_gejala=$_POST['id'];
		$nama_gejala=$_POST['nama_gejala'];
		$hasil= _update_gejala($id_gejala,$nama_gejala);
		if($hasil==0){
			$_SESSION ['add']='<div class="alert alert-success"> Data berhasil diubah </div>';	
		}else{
			 $_SESSION ['add']='<div class="alert alert-error"> Data gagal diubah </div>';
		}
		echo '<script> window.location.href="home.php?list='.$_GET['list'].'" </script>';
	}elseif($_POST['list']=="hipotesa"){
		$id_hipotesa=$_GET['id'];
		$nama_hipotesa=$_POST['nama_hipotesa'];
		
		$hasil= _update_hipotesa($id_hipotesa,$nama_hipotesa);
		if($hasil==0){
			$_SESSION ['add']='<div class="alert alert-success"> Data berhasil diubah </div>';	
		}else{
			 $_SESSION ['add']='<div class="alert alert-error"> Data gagal diubah </div>';
		}
		echo '<script> window.location.href="home.php?list='.$_GET['list'].'" </script>';	
	}elseif($_POST['list']=="rule"){
		//hapus aturan berdasarkan id_penyakit
		$id_gejala=$_POST['id_gejala'];
		$jika_ya=$_POST['combo_ya'];
		$jika_tidak=$_POST['combo_tidak'];
		$mulai=$_POST['combo_mulai'];
		$selesai=$_POST['combo_selesai'];
		$nilai_bayes=$_POST['nilai_bayes'];
		//$sql_del="";
		//$sql_del="delete from tb_aturan where id_hipotesa='".$id_hipotesa."'";
		//mysql_query($sql_del)or die (mysql_error());
		if($nilai_bayes<=1){
		//$respon=_cek_aturan($id_penyakit,$id_gejala);
		//echo $respon;
		//if($respon==0){
			//$id_aturan=_kd_auto('id_diagn','tb_aturan','A');
			$sql_update="update tb_gejala set jika_ya='".$jika_ya."',jika_tidak='".$jika_tidak."',mulai='".$mulai."',selesai='".$selesai."',nilai_bayes='".$nilai_bayes."' where id_gejala='".$id_gejala."'";
			$result_update=mysql_query($sql_update)or die(mysql_error());
			if($result_update){
				$_SESSION ['add']='<div class="alert alert-success"> Data berhasil disimpan </div>';	
			}else{
				$_SESSION ['add']='<div class="alert alert-success"> Data gagal disimpan </div>';	
			}
			echo '<script> window.location.href="home.php?list='.$_GET['list'].'" </script>';
		//}else{
			//$_SESSION ['add']='<div class="alert alert-success"> Aturan sudah ada</div>';
		//}
		}else{
			$_SESSION ['add']='<div class="alert alert-success"> Nilai bayes tidak boleh lebih dari 1</div>';	
		}
		//simpan aturan baru
		//$sql_aturan="";
		
		/*$jmlAr=COUNT($_POST['chk']);
		for($xi=0;$xi<$jmlAr;$xi++){
			//echo $_POST['cf'][$xi];
			
			$id_aturan=_kd_auto('id_aturan','tb_aturan','A');
			$sql_aturan="insert into tb_aturan(id_aturan,id_gejala,id_hipotesa,nilai_bayes)values('".$id_aturan."','".$_POST['chk'][$xi]."','".$id_hipotesa."','".$_POST['cf'][$xi]."')";
			
			echo $xi."|".$_POST['chk'][$xi]."|".$_POST['cf'][$xi]."</br>";
			mysql_query($sql_aturan)or die(mysql_error());
			
			//if(!empty
			$sql_n_cf="update into tb_aturan set nilai_bayes='".$_POST['cf'][$xi];*/
		//}
			//$_SESSION ['add']='<div class="alert alert-success"> Data berhasil disimpan </div>';
			
	}elseif($_POST['list']=="admin"){
			$id_admin=$_POST['id'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			$nama_lengkap=$_POST['nama_lengkap'];
			$hasil=_update_admin($id_admin,$email,$password,$nama_lengkap);
			if($hasil==0){
			$_SESSION ['add']='<div class="alert alert-success"> Data berhasil diubah </div>';	
		}else{
			 $_SESSION ['add']='<div class="alert alert-error"> Data gagal diubah </div>';
		}
		echo '<script> window.location.href="home.php?list='.$_GET['list'].'" </script>';	
			
	}
}

?>
<html>
<head>
</head>
<body>
<div class="span10">
<?php
	if(isset($_GET['list'])){
		if($_GET['list']=="gejala"){
			$id_gejala=$_GET['id'];
			$sql2 = "SELECT * FROM tb_gejala WHERE id_gejala='".$id_gejala."'";
			$result2 = mysql_query($sql2);
			$data =  mysql_fetch_assoc($result2);
?>
		<p><strong style="font-size: 20px"> Ubah Gejala </strong>
			<hr>
			</p>
			<br>
			<form class="form-horizontal" id="frm_gejala" name="frm_gejala" action="form_ubah.php?list=<?php echo $_GET['list'];?>" method="post">
            	<input type="hidden" name="list" value="<?php echo $_GET['list'];?>" />
                 	<div class="control-group">
        			<label class="control-label"> Nama Gejala </label>
           				<div class="controls"> 
                        <div align="justyfy">
                        <Textarea name="nama_gejala" rows="5" style="width:300px;"><?php echo $data['nama_gejala'];?></Textarea> 
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id_gejala;?>">
                        </div>
                     </div>
 					<div class="control-group">  
                    	<div class="controls">              
                		<button class="btn btn-primary" name="update">Simpan</button>
    					<a href="home.php?list=<?php echo $_GET['list']?>" class="btn">Kembali</a>
                		</div>
                    </div>
            </form>
            <?php
		}elseif($_GET['list']=="rule"){
		$sql="select * from tb_gejala where id_gejala='".$_GET['id']."'";
		$result=mysql_query($sql);
		$data=mysql_fetch_array($result);
			?>
<p><strong style="font-size: 20px"> Aturan Diagnosa </strong>
			<hr>
			</p>
			<br>
			<form class="form-horizontal" id="frm_rule" name="frm_rule" action="form_ubah.php?list=<?php echo $_GET['list'];?>&id=<?php echo $_GET['id'];?>" method="post">
            <input type="hidden" name="list" value="<?php echo $_GET['list'];?>" />
            <input type="hidden" name="id_gejala" value="<?php echo $_GET['id'];?>" />
            <div class="control-group">
            	<div class="controls">
                <label><b>Keterangan :</b></label>
                <div align="justyfy">
            <textarea readonly id="keterangan" name="keterangan" rows="5" style="width:300px;"><?php echo trim($data['nama_gejala']);?> </textarea></div>
                </div>
                </div>
                 <div class="control-group">
                <div class="controls">
                  <label><b>Jika Ya :</b></label>
            <select id='combo_ya' name='combo_ya' style='width:300px;' required="true" >
						<?php _combo_ya2($data['jika_ya']);?>
				</select>
                </div>
                </div>
                <div class="control-group">
                <div class="controls">
                <label><b>Jika Tidak :</b></label>
                <select id='combo_tidak' name='combo_tidak' style='width:300px;' required="true" >
						<?php _combo_ya2($data['jika_tidak']);?>
				</select>
                </div>
                </div>
                
                <div class="control-group">
                <div class="controls">
                <label><b>Mulai :</b></label>
                <select id='combo_tidak' name='combo_mulai' style='width:300px;' required="true" >
						<?php _combo_mulai($data['mulai']);?>
				</select>
                </div>
                </div>
                
                <div class="control-group">
                <div class="controls">
                <label><b>Selesai :</b></label>
                <select id='combo_tidak' name='combo_selesai' style='width:300px;' required="true" >
						<?php _combo_selesai($data['selesai']);?>
				</select>
                </div>
                </div>
                
                 <div class="control-group">
                <div class="controls">
                <label><b>Nilai Bayes :</b></label>
                <input type="text" style="text-align:right;" name="nilai_bayes" value='<?php echo $data['nilai_bayes']?>'/>
                </div>
            	</div>
                <div class="control-group">
                <div class="controls">
                <input class="btn btn-primary" value="Simpan" name="update" type="submit" />
                </div>
                </div>
            </form>
<?php
		}elseif($_GET['list']=="hipotesa"){
			$id=$_GET['id'];
			$sql2 = "SELECT * FROM tb_hipotesa WHERE id_hipotesa='".$id."'";
			$result2 = mysql_query($sql2);
			$data =  mysql_fetch_assoc($result2);
?>
		<p><strong style="font-size: 20px"> Ubah Hipotesa </strong>
			<hr>
			</p>
			<br>
			<form class="form-horizontal" id="frm_penyakit" name="frm_penyakit" action="form_ubah.php?list=<?php echo $_GET['list'];?>&id=<?php echo $_GET['id'];?>" method="post">
            	<input type="hidden" name="list" value="<?php echo $_GET['list'];?>" />
                 	<div class="control-group">
        			<label class="control-label"> Nama Hipotesa </label>
           				<div class="controls"> 
                        <input type="text" name="nama_penyakit" value="<?php echo $data['nama_hipotesa'];?>"> 
                        </div>
                     </div>
 					<div class="control-group">  
                    	<div class="controls">              
                		<button class="btn btn-primary" name="update">Simpan</button>
    					<a href="home.php?list=<?php echo $_GET['list']?>" class="btn">Kembali</a>
                		</div>
                    </div>
            </form>
<?php
		}elseif($_GET['list']=="aturan"){
			
			 if (isset ($_SESSION ['update'])){
            echo $_SESSION ['update'];
            unset ($_SESSION ['update']);
        }
        if (isset ($_SESSION ['add'])){
            echo $_SESSION ['add'];
            unset ($_SESSION ['add']);
        }
        if (isset ($_SESSION ['delete'])){
            echo $_SESSION ['delete'];
            unset ($_SESSION ['delete']);
        }
		
		
?>
		

<?php 
		}elseif($_GET['list']=="admin"){
			$id=$_GET['id'];
			$sql2 = "SELECT * FROM tb_user WHERE id_user='".$id."'";
			$result2 = mysql_query($sql2);
			$data =  mysql_fetch_assoc($result2);
?>
			<p><strong style="font-size: 20px"> Ubah Admin </strong>
			<hr>
			</p>
			<br>
			<form class="form-horizontal" id="frm_admin" name="frm_admin" action="form_ubah.php?list=<?php echo $_GET['list'];?>" method="post">
            	<input type="hidden" name="list" value="<?php echo $_GET['list'];?>" />
                 	<div class="control-group">
        			<label class="control-label"> Email </label>
           				<div class="controls"> 
                        <input type="email" name="email" value="<?php echo $data['email'];?>"> 
                        </div>
                     </div>
                     <div class="control-group">
                     <label class="control-label">Password</label>
                     	<div class="controls">
                        <input type="password" name="password" value="<?php echo $data['password'];?>" />
                        </div>
                     </div>
                     <div class="control-group">
                     <label class="control-label">Nama Lengkap</label>
                     	<div class="controls">
                        <input type="text" name="nama_lengkap" value="<?php echo $data['nama_lengkap'];?>" />
                         <input type="hidden" name="id" value="<?php echo $id;?>"
                        </div>
                     </div>
                     
 					<div class="control-group">  
                    	<div class="controls">              
                		<button class="btn btn-primary" name="update">Simpan</button>
    					<a href="home.php?list=<?php echo $_GET['list']?>" class="btn">Kembali</a>
                		</div>
                    </div>
            </form>
		

<?php
		}
	}
?>
</div>
<style>
    span {
        float: left;
        width: 100px;
    }
</style>
<?php
include_once 'footer.php';
?>
</body>
</html>