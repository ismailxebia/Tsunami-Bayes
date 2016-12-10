<?php
error_reporting(0);
include_once '../inc/koneksi.php';
include_once '../inc/function.php';
$param=$_GET['mod'];
$no=0;

if($param=="gejala"){
		$sql = "SELECT * FROM tb_gejala ORDER BY `id_gejala` DESC";
		
        $result = mysql_query($sql)or die (mysql_error());
        echo '<table border="1" width="100%" class="table table-bordered">';
        echo '<thead>
            <th>No.</th>
            <th>Gejala</th>
            </thead>';
        echo '<tbody>';
        while($data=mysql_fetch_object($result)){
			$no++;
            echo '<tr>
				<td width="10%">'.$no.'</td>
                <td>'.$data->nama_gejala.'</td></tr>';
        }
        	echo '</tbody>';
        	echo '</table>';
}elseif($param=="hipotesa"){
	$sql = "SELECT * FROM tb_hipotesa";
		
        $result = mysql_query($sql)or die (mysql_error());
        echo '<table border="1" width="100%" class="table table-bordered">';
        echo '<thead>
            <th>No.</th>
            <th>Nama Hipotesa</th>
            </thead>';
        echo '<tbody>';
        while($data=mysql_fetch_object($result)){
			$no++;
            echo '<tr>
				<td width="10%">'.$no.'</td>
                <td>'.$data->nama_hipotesa.'</td>
				</tr>';
        }
        	echo '</tbody>';
        	echo '</table>';
}elseif($param=="member"){
	$sql="select * from tb_user where status_admin='T' order by id_user DESC";
			$result=mysql_query($sql)or die(mysql_error());
			echo '<table border="1" width="100%" class="table table-bordered">';
        echo '<thead>
            <th>No.</th>
            <th>Email</th>
			<th>Nama Lengkap</th>
            </thead>';
        echo '<tbody>';
        while($data=mysql_fetch_object($result)){
			$no++;
            echo '<tr>
				<td width="10%">'.$no.'</td>
                <td>'.$data->email.'</td>
				<td>'.$data->nama_lengkap.'</td>
				</tr>';
        }
        	echo '</tbody>';
        	echo '</table>';
}elseif($param=="admin"){
	$sql="select * from tb_user WHERE status_admin='Y' order by id_user DESC";
			
			$result=mysql_query($sql)or die(mysql_error());	
			 echo '<table border="1" width="100%" class="table table-bordered">';
        echo '<thead>
            <th>No.</th>
            <th>Email</th>
			<th>Nama Lengkap</th>
            </thead>';
        echo '<tbody>';
        while($data=mysql_fetch_object($result)){
			$no++;
            echo '<tr>
				<td width="10%">'.$no.'</td>
                <td>'.$data->email.'</td>
				<td>'.$data->nama_lengkap.'</td>
				</tr>';
        }
        	echo '</tbody>';
        	echo '</table>';
}elseif($param=="lap_gejala"){
	
}elseif($param=="lap_hipotesa"){
	$sql="select * from tb_sispak order by id_sispak DESC";
			
			$result=mysql_query($sql)or die(mysql_error());	
			 echo '<table border="1" width="100%" class="table table-bordered">';
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
				<td width="10%">'.$no.'</td>
                <td>'.$data->tanggal.'</td>
				<td>'._tampil_nama_user($data->id_user).'</td>
				<td>'._tampil_nama_hipotesa($data->id_hipotesa).'</td>
				<td>'.$data->nilai_bayes.'</th>
				</tr>';
        }
        	echo '</tbody>';
        	echo '</table>';
}elseif($param=="rule"){
	$sql="select * from tb_gejala";
			$result=mysql_query($sql)or die(mysql_error());
			echo '<table border="1" width="100%" class="table table-bordered">';
        echo '<thead>
           		<th>No.</th>
				<th>ID</th>
				<th>Nama Gejala</th>
				<th>Jika Ya</th>
				<th>Jika Tidak</th>
				<th>Mulai</th>
				<th>Selesai</th>
				<th>Nilai Bayes</th>
            </thead>';
        echo '<tbody>';
        while($data=mysql_fetch_object($result)){
			$no++;
            echo '<tr>
				<td width="10%">'.$no.'</td>
                <td>'.$data->id_gejala.'</td>
				<td>'.$data->nama_gejala.'</td>
				<td>'.$data->jika_ya.'</td>
				<td>'.$data->jika_tidak.'</td>
				<td>'.$data->mulai.'</td>
				<td>'.$data->selesai.'</td>
				<td>'.$data->nilai_bayes.'</td>
				</tr>';
        }
        	echo '</tbody>';
        	echo '</table>';	
}
?>
<script>
		window.load = print_d();
		function print_d(){
			window.print();
		}
	</script>