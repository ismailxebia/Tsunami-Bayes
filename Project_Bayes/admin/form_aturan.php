<html>
<head>
<?php
include_once 'header.php';
include_once '../inc/function.php';

if(isset($_POST['add'])){
		
}

?>
</head>

<body>
<div class="span10">

			<p><strong style="font-size: 20px"> Aturan </strong>
			<hr>
			</p>
			<br>
			<form class="form-horizontal" id="frm_gejala" name="frm_gejala" action="form_aturan.php?list=<?php echo $_GET['list'];?>" method="post">
            	<input type="hidden" name="list" value="<?php echo $_GET['list'];?>" />
                 	<div class="control-group">
        			<label class="control-label"> Nama Gejala </label>
           				<div class="controls"> 
                        <input readonly type="text" name="nama_gejala" value='<?php echo _tampil_gejala($_GET['id']);?>'> 
                        </div>
                     </div>
                     <div class="control-group">
                     	<label class="control-label">Jika Ya</label>
                        <div class="controls">
                        	<select id='combo_gejala' name='combo_gejala' style='width:300px;' required="true" >
						<?php _combo_aturan($_GET['id']);?>
				</select>
                        </div>
                     </div>
                     
                     <div class="control-group">
                     	<label class="control-label">Jika Tidak</label>
                        <div class="controls">
                        	<select id='combo_gejala' name='combo_gejala' style='width:300px;' required="true" >
						<?php _combo_aturan($_GET['id']);?>
				</select>
                        </div>
                     </div>
 					<div class="control-group">  
                    	<div class="controls">              
                		<button class="btn btn-primary" name="add_baru">Simpan</button>
    					<a href="home.php?list=<?php echo $_GET['list']?>" class="btn">Kembali</a>
                		</div>
                    </div>
            </form>
</div>

</body>
</html>