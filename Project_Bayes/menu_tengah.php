<div class="art-content-layout-wrapper layout-item-0"> 
<div class="art-content-layout layout-item-1">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-2" style="width: 33%" >
        <p style="text-align: center;"><img width="128" height="128" alt="" src="" class=""></p>
        <h2 style="text-align: center;">Penjelasan Tsunami</h2>
        <p style="text-align: center;">Berikut ini adalah penjelasan mengenai Tsunami</p>
        <p style="text-align: center;"><a href="daftarpenyakit.php" class="art-button">Selengkapnya...</a></p>
    </div>
    <div class="art-layout-cell layout-item-2" style="width: 34%" >
        <p style="text-align: center;"><img width="128" height="128" alt="" src="" class=""></p>
        <?php 
		if(isset($_SESSION['s_id_user'])){
					if(empty($_SESSION['s_id_user'])){;?>
        <h2 style="text-align: center;">Register / Login</h2>
        <p style="text-align: center;">Silahkan Login untuk dapat berkonsultasi</p>
        <p style="text-align: center;"><a href="login.php" class="art-button">Masuk</a></p>
					<?php }else{;?>
		<h2 style="text-align: center;">Selamat Datang <?php echo $_SESSION['s_nama_lengkap'];?></h2>
        <p style="text-align: center;"></p>
        <p style="text-align: center;"><a href="logout_action.php" class="art-button">Logout</a></p>
					<?php }
		}else{;?>
			<h2 style="text-align: center;">Register / Login</h2>
        	<p style="text-align: center;">Silahkan Login untuk dapat berkonsultasi</p>
        	<p style="text-align: center;"><a href="login.php" class="art-button">Masuk</a></p>
		<?php };?>
    </div>
    <div class="art-layout-cell layout-item-3" style="width: 33%" >
        <p style="text-align: center;"><img width="128" height="128" alt="" src="" class=""></p>
        <h2 style="text-align: center;">Diagnosa</h2>
        <p style="text-align: center;">Konsultasikan tentang diagnosa Tsunami</p>
        <?php if(isset($_SESSION['s_id_user'])){
					if(empty($_SESSION['s_id_user'])){?>
        				<p style="text-align: center;"><a href="login.php" class="art-button">Mulai Diagnosa</a></p>
       <?php			}else{?>
       					<p style="text-align: center;"><a href="konsultasi.php" class="art-button">Mulai Diagnosa</a></p>
       <?php 
	   			}
	   }else{?>
       				<p style="text-align: center;"><a href="login.php" class="art-button">Mulai Diagnosa</a></p>
       <?php };?>
    </div>
    </div>
</div>
</div>