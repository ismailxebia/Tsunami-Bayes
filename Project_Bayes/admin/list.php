<div class="span8">
<?php 
$sql="";
$sql_page="";
$limit=10;
$page="";
if(isset($_GET['list'])){
	
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
	
	if($_GET['list']!="lap_hipotesa" and $_GET['list']!="member" and $_GET['list']!="lap_gejala" and $_GET['list']!="pesan" and $_GET['list']!="rule") {
		echo '<a class="btn" href="form.php?list='.$_GET['list'].'">Tambah</a>';
	}
	?>
	<a href="#" onClick="window.open('print_admin.php?mod=<?php echo $_GET['list'];?>','winpopup','toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=850,height=680')" class="btn">Print</a>
	<?php
	//<a href="#" onClick="window.open('print_hasil.php','winpopup','toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=850,height=680')" class="btn btn-warning"><i class="icon-print"></i>Print</a>
	
	//paging
	$sql_page="";
	if($_GET['list']=="gejala"){
		$sql_page="select * from tb_gejala";
	}elseif($_GET['list']=="hipotesa" or $_GET['list']=="lap_hipotesa"){
		$param="P";
		$sql_page="select * from tb_hipotesa";	
	}elseif($_GET['list']=="rule"){
		$sql_page="select * from tb_gejala";
	}elseif($_GET['list']=="member"){
		$sql_page="select * from tb_user where status_admin='T'";
	}elseif($_GET['list']=="admin"){
		$sql_page="select * from tb_user where status_admin='Y'";	
	}elseif($_GET['list']=="pesan"){
		$sql_page="select * from tb_pesan";
	}
	$result_page=mysql_query($sql_page);
	$total_data=mysql_num_rows($result_page);
	$total_page=ceil($total_data/$limit);
		if(!empty($total_page)){
			$page='<div class="pagination pull-right" style="float:none; margin:0 auto"><ul>';
			for($i=1;$i<=$total_page;$i++){
				 $page .= '<li '.((isset($_GET['page']) && $_GET['page']==$i)?'class="active"':'').'><a href="home.php?list='.$_GET['list'].'&page='.$i.'">'.$i.'</a></li>'; 
			}//tutup for
			$page.= '</ul></div>';
		}//tutup if


//ambil data berdasarkan pilihan menu
		if(isset($_GET['page'])){
            $offset = ($_GET['page'] - 1) * $limit;
        }
        else{
            $offset = 0;
        }
		
		$sql="";
		$no=0;
		if($_GET['list']=="gejala"){
			$sql = "SELECT * FROM tb_gejala ORDER BY `id_gejala` Asc LIMIT $offset,$limit";
		
        $result = mysql_query($sql)or die (mysql_error());
        echo '<table class="table table-bordered">';
        echo '<thead>
            <th>No.</th>
            <th>Gejala</th>
            <th>Aksi</th>
            </thead>';
        echo '<tbody>';
        while($data=mysql_fetch_object($result)){
			$no++;
            echo '<tr>
				<td>'.$no.'</td>
                <td>'.$data->nama_gejala.'</td>
                <td><a href="form_ubah.php?list='.$_GET['list'].'&id='.$data->id_gejala.'">Ubah</a>
                <td><a href="hapus.php?tabel=tb_gejala&field=id_gejala&list=gejala&id='.$data->id_gejala.'" onclick="delete_confirm2(\''.$data->id_gejala.'\')">Hapus</a></tr>';
        }
        	echo '</tbody>';
        	echo '</table>';
	//penyakit
		}elseif($_GET['list']=="hipotesa"){
			$param="P";
			$sql = "SELECT * FROM tb_hipotesa ORDER BY `id_hipotesa` Asc LIMIT $offset,$limit";
		
        $result = mysql_query($sql)or die (mysql_error());
        echo '<table class="table table-bordered">';
        echo '<thead>
            <th>No.</th>
			<th>Nama Hipotesa</th>
            <th>Aksi</th>
            </thead>';
        echo '<tbody>';
        while($data=mysql_fetch_object($result)){
			$no++;
            echo '<tr>
				<td>'.$no.'</td>
				<td>'.$data->nama_hipotesa.'</td>
                <td><a href="form_ubah.php?list='.$_GET['list'].'&id='.$data->id_hipotesa.'">Ubah</a>
				<td><a href="form_gejala.php?list='.$_GET['list'].'&id='.$data->id_hipotesa.'">Gejala</a></td>
                <td><a href="hapus.php?tabel=tb_hipotesa&field=id_hipotesa&list=hipotesa&id='.$data->id_hipotesa.'" onclick="delete_confirm2(\''.$data->id_hipotesa.'\')">Hapus</a></tr>';
        }
        	echo '</tbody>';
        	echo '</table>';
		
		}elseif($_GET['list']=="rule"){
			$sql = "SELECT * FROM tb_gejala ORDER BY `id_gejala` Asc LIMIT $offset,$limit";
		
        	$result = mysql_query($sql)or die (mysql_error());
        	echo '<table class="table table-bordered">';
        	echo '<thead>
            	<th>No.</th>
				<th>ID</th>
				<th>Nama Gejala</th>
				<th>Jika Ya</th>
				<th>Jika Tidak</th>
				<th>Mulai</th>
				<th>Selesai</th>
				<th>Nilai Bayes</th>
            	<th>Aksi</th>
            	</thead>';
        	echo '<tbody>';
        	while($data=mysql_fetch_object($result)){
				$no++;
            echo '<tr>
				<td>'.$no.'</td>
				<td>'.$data->id_gejala.'</td>
				<td>'.$data->nama_gejala.'</td>
				<td>'. _tampil_ya($data->jika_ya).'</td>
				<td>'._tampil_ya($data->jika_tidak).'</td>
				<td>'.$data->mulai.'</td>
				<td>'.$data->selesai.'</td>
				<td>'.$data->nilai_bayes.'</td>
                <td><a href="form_ubah.php?list='.$_GET['list'].'&id='.$data->id_gejala.'">Ubah</a>
                 <td><a href="hapus.php?tabel=tb_gejala&field=id_gejala&list=rule&id='.$data->id_gejala.'" onclick="delete_confirm2(\''.$data->id_gejala.'\')">Hapus</a></tr>';
        }
        	echo '</tbody>';
        	echo '</table>';
		}elseif($_GET['list']=="member"){
			$sql="select * from tb_user where status_admin='T' order by id_user DESC LIMIT $offset,$limit";
			$result=mysql_query($sql)or die(mysql_error());
			echo '<table class="table table-bordered">';
        echo '<thead>
            <th>No.</th>
            <th>Email</th>
			<th>Nama Lengkap</th>
            <th>Aksi</th>
            </thead>';
        echo '<tbody>';
        while($data=mysql_fetch_object($result)){
			$no++;
            echo '<tr>
				<td>'.$no.'</td>
                <td>'.$data->email.'</td>
				<td>'.$data->nama_lengkap.'</td>
                <td><a href="hapus.php?tabel=tb_user&field=id_user&list=admin&id='.$data->id_user.'" onclick="delete_confirm2(\''.$data->id_user.'\')">Hapus</a></tr>';
        }
        	echo '</tbody>';
        	echo '</table>';
			
		}elseif($_GET['list']=="admin"){
			$sql="select * from tb_user WHERE status_admin='Y' order by id_user DESC LIMIT $offset,$limit";
			
			$result=mysql_query($sql)or die(mysql_error());	
			 echo '<table class="table table-bordered">';
        echo '<thead>
            <th>No.</th>
            <th>Email</th>
			<th>Nama Lengkap</th>
            <th>Aksi</th>
            </thead>';
        echo '<tbody>';
        while($data=mysql_fetch_object($result)){
			$no++;
            echo '<tr>
				<td>'.$no.'</td>
                <td>'.$data->email.'</td>
				<td>'.$data->nama_lengkap.'</td>
                <td><a href="form_ubah.php?list='.$_GET['list'].'&id='.$data->id_user.'">Ubah</a>
               <td><a href="hapus.php?tabel=tb_user&field=id_user&list=admin&id='.$data->id_user.'" onclick="delete_confirm2(\''.$data->id_user.'\')">Hapus</a></tr>';
        }
        	echo '</tbody>';
        	echo '</table>';
		}elseif($_GET['list']=="lap_gejala"){
			
		}elseif($_GET['list']=="lap_hipotesa"){
			//hit jumlah record
			$sql="select * from tb_sispak order by id_sispak DESC LIMIT $offset,$limit";
			
			$result=mysql_query($sql)or die(mysql_error());	
			 echo '<table class="table table-bordered">';
        echo '<thead>
            <th>No.</th>
            <th>Tanggal</th>
			<th>Member</th>
            <th>Hasil Analisa</th>
			<th>Nilai Bayes</th>
            </thead>';
        echo '<tbody>';
        while($data=mysql_fetch_object($result)){
			$no++;
            echo '<tr>
				<td>'.$no.'</td>
                <td>'.$data->tanggal.'</td>
				<td>'._tampil_nama_user($data->id_user).'</td>
				<td>'._tampil_nama_hipotesa($data->id_hipotesa).'</td>
				<td>'.$data->nilai_bayes.'</td>
				</tr>';
        }
        	echo '</tbody>';
        	echo '</table>';
			
		}elseif($_GET['list']=="pesan"){
			$sql="select * from tb_pesan order by id_pesan DESC LIMIT $offset,$limit";
			$result=mysql_query($sql)or die(mysql_error());
			echo '<table class="table table-bordered">';
        echo '<thead>
            <th>No.</th>
			<th>Tanggal</th>
            <th>Email</th>
			<th>Nama Lengkap</th>
			<th>Judul</th>
			<th>Isi</th>
            <th>Aksi</th>
            </thead>';
        echo '<tbody>';
        while($data=mysql_fetch_object($result)){
			$no++;
            echo '<tr>
				<td>'.$no.'</td>
				<td>'.$data->tanggal.'</td>
                <td>'.$data->email.'</td>
				<td>'.$data->nama.'</td>
				<td>'.$data->subjek.'</td>
				<td>'.$data->isi.'</td>
                <td><a href="hapus.php?tabel=tb_pesan&field=id_pesan&list=pesan&id='.$data->id_pesan.'" onclick="delete_confirm2(\''.$data->id_pesan.'\')">Hapus</a></tr>';
        }
        	echo '</tbody>';
        	echo '</table>';
		}


?>
 <?php
 if(($_GET['list']!="lap_hipotesa")and($_GET['list']!="lap_gejala")){
 	echo '<div style="width:100%; text-align:center;float:left">'.$page.'</div>';
 }
}
 include_once 'footer.php';
?>

</div><!-- span10 -->

<script>
    function delete_confirm2(id){
        var id_hp = id;
        var confirmModal = $('<div class="modal hide fade">'+
            '<div class="modal-header">'+
            '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'+
            '<h3>Konfirmasi</h3></div>'+
            '<div class="modal-body"><p>Anda yakin ingin menghapus?</p></div>'+
            '<div class="modal-footer"><a href="#" class="btn" data-dismiss="modal">Batal</a>'+
            '<a href="#" class="btn btn-primary" id="okButton">Hapus</a></div></div>');
        confirmModal.find("#okButton").click(function(event){
            confirmModal.modal('hide');
            window.location.href = 'mobile.php?merek=<?php echo $_GET['merek'];?>&delete_hp='+id_hp;
        });
        confirmModal.modal('show');      
    }
</script>