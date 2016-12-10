<nav class="art-nav">
    <div class="art-nav-inner">
    <ul class="art-hmenu">
    <li><a href="index.php" class="active">Home</a></li>
    <?php
		if(isset($_SESSION['s_id_user'])){
			if(!empty($_SESSION['s_id_user'])){
			
	;?>
    <li><a href="riwayat_konsultasi.php">Riwayat Konsultasi</a></li>
    <?php
			}
		}
	?>
    </ul> 
        </div>
    </nav>