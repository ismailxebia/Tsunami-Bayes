<?php
error_reporting(0);
session_start();
function query($qry) {
	$result = mysql_query($qry) or die("Gagal melakukan query pada :
	 <br>$qry<br><br>Kode Salah : <br>&nbsp;&nbsp;&nbsp;" . mysql_error() . "!");
	return $result;
}
function fetch_row($qry) {
	$tmp = query($qry);
	list($result) = mysql_fetch_row($tmp);
	return $result;
}

function _kd_auto($field,$table,$x) {
$kode_temp = fetch_row("SELECT $field FROM $table where $field LIKE'%".$x."%' ORDER BY $field DESC LIMIT 0,1");
	if ($kode_temp == '')
		$kode = $x."000001";
	else {
		$jum = substr($kode_temp, 1, 7);
		$jum++;
		if ($jum <= 9)
			$kode = $x."00000" . $jum;
		elseif ($jum <= 99)
			$kode = $x."0000" . $jum;
		elseif ($jum <= 999)
			$kode = $x."000" . $jum;
		elseif ($jum <= 9999)
			$kode = $x."00" . $jum;
		elseif ($jum <= 99999)
			$kode = $x."0" . $jum;
		else
			die("ID melebihi batas");
	}
	return $kode;
}

//simpan gejala
function _simpan_gejala($nama_gejala){
	$sql="";
	$balas="1";
	$id_gejala= _kd_auto('id_gejala','tb_gejala','G');
	if(!empty($nama_gejala)){
		$sql="insert into tb_gejala(id_gejala,nama_gejala)values('".$id_gejala."','".$nama_gejala."')";
		$result=mysql_query($sql)or die(mysql_error());
		if($result){
			$balas="0";	
		}else{
			$balas="1";	
		}
	}
	return $balas;
}

function _update_gejala($id_gejala,$nama_gejala){
	$sql="";
	$balas="1";
	if(!empty($id_gejala)){
		$sql="update tb_gejala set nama_gejala='".$nama_gejala."' where id_gejala='".$id_gejala."'";
		$result=mysql_query($sql)or die(mysql_error());
		if($result){
			$balas="0";	
		}else{
			$balas="1";	
		}
	}
}

//penyakit
function _simpan_hipotesa($nama_hipotesa){
	$sql="";
	$balas="1";
	$id_hipotesa= _kd_auto('id_hipotesa','tb_hipotesa','P');
	if(!empty($nama_hipotesa)){
		$sql="insert into tb_hipotesa(id_hipotesa,nama_hipotesa)values('".$id_hipotesa."','".$nama_hipotesa."')";
		$result=mysql_query($sql)or die(mysql_error());
		if($result){
			$balas="0";	
		}else{
			$balas="1";	
		}
	}
	return $balas;	
}

function _simpan_admin($email,$password,$nama_lengkap){
	$sql="";
	$balas="1";
	$stat_admin="Y";
	$id_admin= _kd_auto('id_user','tb_user','U');
	
	if(!empty($email)){
		$sql="insert into tb_user(id_user,email,password,nama_lengkap,status_admin)value('".$id_admin."','".$email."','".$password."','".$nama_lengkap."','".$stat_admin."')";
		$result=mysql_query($sql)or die (mysql_error());
		if($result){
			$balas=0;	
		}else{
			$balas=1;	
		}
	}
	return $balas;
}

function _update_hipotesa($id_hipotesa,$nama_hipotesa){
	$sql="";
	$balas="1";
	if(!empty($id_hipotesa)){
		$sql="update tb_hipotesa set nama_hipotesa='".$nama_hipotesa."' where id_hipotesa='".$id_hipotesa."'";
		$result=mysql_query($sql)or die(mysql_error());
		if($result){
			$balas="0";	
		}else{
			$balas="1";	
		}
	}
	return $balas;
}

function _update_admin($id_admim,$email,$password,$nama_lengkap){
	$sql="";
	$balas=1;
	if(!empty($id_admim)){
		$sql="update tb_user set email='".$email."',password='".$password."',nama_lengkap='".$nama_lengkap."' where id_user='".$id_admim."'";
		$result=mysql_query($sql)or die(mysql_error());
		if($result){
			$balas=0;	
		}else{
			$balas=1;
		}
	}
	return $balas;
}

function _combo_status_admin($kode) {
	echo "<option value='' selected>- Pilih -</option>";
	$kat = array('Ya', 'Tidak');
	foreach($kat as $key => $value) {
		if($kode == "")
			echo "<option value='$value'> " . ucwords($value) . " </option>";
		else
			echo "<option value='$value'" . selected($value, $kode) . "> " . ucwords($value) . " </option>";
	}			
}

function _cek_status_admin($kode){
	$status="";
	if(!empty($kode)){
		if($kode='Y'){
			$status="YA";	
		}else{
			$status="Tidak";	
		}
	}
	return $status;
}

function _tampil_nama_hipotesa($id){
	$nama_hipotesa="";
	$sql="";
	if(!empty($id)){
		$sql="select nama_hipotesa from tb_hipotesa where id_hipotesa='".$id."'";
		$result=mysql_query($sql)or die(mysql_error());
		$rows=mysql_fetch_array($result);
		$nama_hipotesa=$rows['nama_hipotesa'];
	}
	return $nama_hipotesa;
		
}

function _tampil_kategori($id){
	$respon="";
	if(!empty($id)){
		$sql="select kategori from tb_hipotesa where id_hipotesa='".$id."'";
		$result=mysql_query($sql);
		$data=mysql_fetch_array($result);
		$respon=$data['kategori'];	
	}
	return $respon;
}


function _tampil_nama_gejala($id){
	$respon="";
	if(!empty($id)){
		$sql="select nama_gejala from tb_gejala where id_gejala='".$id."'";
		$result=mysql_query($sql);
		$data=mysql_fetch_array($result);
		$respon=$data['nama_gejala'];	
	}
	return $respon;
}

function _tampil_solusi($id){
	$respon="";
	if(!empty($id)){
		$sql="select solusi from tb_hipotesa where id_hipotesa='".$id."'";
		$result=mysql_query($sql);
		$data=mysql_fetch_array($result);
		$respon=$data['solusi'];	
	}
	return $respon;
}

function _tampil_obat($id){
	$respon="";
	if(!empty($id)){
		$sql="select obat from tb_hipotesa where id_hipotesa='".$id."'";
		$result=mysql_query($sql);
		$data=mysql_fetch_array($result);
		$respon=$data['obat'];	
	}
	return $respon;
}


function _cek_user($email){
	$respon=0;
	$sql="select id_user from tb_user where email='".$email."'";
	$result=mysql_query($sql)or die (mysql_error());
	$row=mysql_num_rows($result);
	return $row;
}

#FUNGSI UNTUK MENAMBAH TEMP ANALISA
function _add_temp_analisa($id_gejala,$id_user){
 $sql="select tb_aturan.* from tb_aturan,tb_temp_hipotesa where tb_aturan.id_hipotesa=tb_temp_hipotesa.id_hipotesa AND tb_temp_hipotesa.id_user='".$id_user."' order by tb_aturan.id_hipotesa,tb_aturan.id_gejala";
 $result=mysql_query($sql);
 while($data=mysql_fetch_array($result)){
	$sqlTemp="insert into tb_temp_analisa(id_user,id_hipotesa,id_gejala)values('".$id_user."','".$data['id_hipotesa']."','".$data['id_gejala']."')";
	mysql_query($sqlTemp)or die (mysql_error()); 
 }
}

#FUNGSI UNTUK MENAMBAH TEMP GEJALA
function _add_temp_gejala($id_gejala,$id_user){
	$sql="insert into tb_temp_gejala(id_user,id_gejala)values('".$id_user."','".$id_gejala."')";
	mysql_query($sql)or die (mysql_error());	
}
#FUNGSI UNTUK MENGOSONGKAN TEMP PENYAKIT
function _del_temp_hipotesa($id_user){
	$sql="delete from tb_temp_hipotesa where id_user='".$id_user."'";
	mysql_query($sql)or die (mysql_error());	
}
#FUNGSI UNTUK MENGOSONGKAN TEMP ANALISA
function _del_temp_analisa($id_user){
	$sql="delete from tb_temp_analisa where id_user='".$id_user."'";
	mysql_query($sql)or die (mysql_error());	
}

function _tampil_nama_user($id){
		$respon="";
		if (!empty($id)){
			$sql="select nama_lengkap from tb_user where id_user='".$id."'";
			$result=mysql_query($sql);
			$data=mysql_fetch_array($result);
			$respon=$data['nama_lengkap'];
		}
		return $respon;
}

function _tampil_email_user($id){
		$respon="";
		if (!empty($id)){
			$sql="select email from tb_user where id_user='".$id."'";
			$result=mysql_query($sql);
			$data=mysql_fetch_array($result);
			$respon=$data['email'];
		}
		return $respon;
}

function _tampil_gejala($id){
		$respon="";
		if (!empty($id)){
			/*$sql="select nama_gejala from tb_gejala where id_gejala='".$id."'";
			$result=mysql_query($sql);
			$data=mysql_fetch_array($result);
			$respon=$data['nama_gejala'];*/
			$sql="select id_gejala from tb_aturan where id_hipotesa='".$id."'";
			$result=mysql_query($sql)or die(mysql_error());
			while($data=mysql_fetch_array($result)){
				$respon[]=$data['id_gejala'];
				
			}
			
		}
		
		return $respon;
}

//// metode bayes ///
function _ambilbayes($id_aturan){
	$respon="";
	if(!empty($id_aturan)){
		$sql="select nilai_bayes from tb_aturan where id_aturan='".$id_aturan."'";
		$result=mysql_query($sql);
		$data=mysql_fetch_array($result);
		$respon=$data['nilai_bayes'];
	}
	return $respon;
}

function _cek_login($email,$password){
	$respon=0;
	if(!empty($email)&& !empty($password)){
	$sql="select * from tb_user where email='".$email."' and password='".$password."' AND status_admin='T' LIMIT 1";
	$result=mysql_query($sql);
	if(mysql_num_rows($result)>0){
		$respon=1;
		$data=mysql_fetch_array($result);	
		$_SESSION['s_id_user']=$data['id_user'];
		$_SESSION['s_nama_lengkap']=$data['nama_lengkap'];
	}else{
		$respon="2";	
	}
}
	return $respon;
}

function _simpan_daftar($email,$password,$nama_lengkap,$status){
	$respon=0;
		
	$id_user=_kd_auto("id_user","tb_user","U");
	$sql="insert into tb_user(id_user,email,password,nama_lengkap,status_admin)values('".$id_user."','".$email."','".$password."','".$nama_lengkap."','".$status."')";
	$result=mysql_query($sql);
	if($result){
		$respon=1;
		$_SESSION['s_id_user']=$id_user;
		$_SESSION['s_nama_lengkap']=$nama_lengkap;	
	}
	
	return $respon;
}

function _cek_email($email){
	$respon=0;
	if(!empty($email)){
		$sql="select id_user from tb_user where email='".$email."'";
		$result=mysql_query($sql);
		$jml=mysql_num_rows($result);
		if($jml==0){
			$respon=1;	
		}
	}
	return $respon;
}

function _combo_mulai($kode) {
	echo "<option value='' selected>- Pilih -</option>";
	$kat = array('Y', 'T');
	foreach($kat as $key => $value) {
		if($kode == "")
			echo "<option value='$value'> " . ucwords($value) . " </option>";
		else
			echo "<option value='$value'" . selected($value, $kode) . "> " . ucwords($value) . " </option>";
	}			
}

function _combo_selesai($kode) {
	echo "<option value='' selected>- Pilih -</option>";
	$kat = array('Y', 'T');
	foreach($kat as $key => $value) {
		if($kode == "")
			echo "<option value='$value'> " . ucwords($value) . " </option>";
		else
			echo "<option value='$value'" . selected($value, $kode) . "> " . ucwords($value) . " </option>";
	}			
}

function _combo_ya($kode){
echo "<option value='' selected>- Pilih -</option>";
	$query = query("SELECT id_gejala,nama_gejala FROM tb_diagnosa");
	while ($row = mysql_fetch_row($query)) {
		if ($kode == "")
			echo "<option value='$row[0]'> " . ucwords($row[0]." ".$row[1]) . " </option>";
		else
			echo "<option value='$row[0]'" . selected($row[0], $kode) . "> " . ucwords($row['0']." ".$row[1]) . " </option>";
	}			
}

/*function _combo_ya2($kode){
	$ar_ya="";
	$ar_nama="";
	echo "<option value='' selected>- Pilih -</option>";
	$query = query("SELECT id_gejala,nama_gejala FROM tb_gejala");
	while($data=mysql_fetch_array($query)){
			$ar_ya[]=$data['id_gejala'];
			$ar_nama[]=$data['nama_gejala'];
	}
	$query_p=query("select id_hipotesa,nama_hipotesa from tb_hipotesa");
	while($data_p=mysql_fetch_array($query_p)){
		$ar_ya[]=$data_p['id_hipotesa'];	
	}
	$pnj=count($ar_ya);
	for($i=0;$i<$pnj;$i++){
			if ($kode == "")
			echo "<option value='$ar_ya[$i]'> " . ucwords($ar_nama[$i]) . " </option>";
		else
			echo "<option value='$ar_ya[$i]'" . selected($ar_nama[$i], $kode) . "> " . ucwords($ar_nama[$i]) . " </option>";
	}
}*/

function _combo_ya2($kode){
	$ar_ya="";
	$ar_nama="";
	echo "<option value='' selected>- Pilih -</option>";
	$query = query("SELECT id_gejala,nama_gejala FROM tb_gejala");
	while($data=mysql_fetch_array($query)){
			$ar_ya[]=$data['id_gejala'];
			$ar_nama[]=$data['nama_gejala'];
	}
	$query_p=query("select id_hipotesa,nama_hipotesa from tb_hipotesa");
	while($data_p=mysql_fetch_array($query_p)){
		$ar_ya[]=$data_p['id_hipotesa'];
		$ar_nama[]=$data_p['nama_hipotesa'];	
	}
	$pnj=count($ar_ya);
	for($i=0;$i<$pnj;$i++){
			if ($kode == "")
			echo "<option value='$ar_ya[$i]'> " . ucwords($ar_ya[$i]) . " </option>";
		else
			echo "<option value='$ar_ya[$i]'" . selected($ar_ya[$i], $kode) . "> " . ucwords($ar_nama[$i]) . " </option>";
	}
}

/*function _tampil_nama_gejala($kode){
	$respon="";
	if(!empty($kode)){
		$sql="select nama_gejala from tb_gejala where id_gejala='".$kode."'";
			
	}
}*/

function _tampil_ya($kode){
	$respon="";
	$ar_ya="";
	$ar_nama="";
	$query = query("SELECT nama_gejala FROM tb_gejala where id_gejala='".$kode."'");
	$jml_data=mysql_num_rows($query);
	if($jml_data>0){
		$fetch=mysql_fetch_array($query);
		$respon=$fetch['nama_gejala'];	
	}else{
		$query_p=query("select nama_hipotesa from tb_hipotesa where id_hipotesa='".$kode."'");
		$jml_data_p=mysql_num_rows($query_p);
		if($jml_data_p>0){
			$fetch_p=mysql_fetch_array($query_p);
			$respon=$fetch_p['nama_hipotesa'];
			//$respon=$kode;	
		}
	}
	return $respon;
		
}


function _combo_tidak($kode){
	echo "<option value='' selected>- Pilih -</option>";
	$query = query("SELECT id_diagnosa,keterangan FROM tb_diagnosa");
	while ($row = mysql_fetch_row($query)) {
		if ($kode == "")
			echo "<option value='$row[0]'> " . ucwords($row[0]." ".$row[1]) . " </option>";
		else
			echo "<option value='$row[0]'" . selected($row[0], $kode) . "> " . ucwords($row['0']." ".$row[1]) . " </option>";
	}	
}

function selected($t1, $t2) {
	if(trim($t1) == trim($t2))
		return "selected";
	else
		return "";
}

///////////////////////////////////////////////////bayes
function _hit_bayes($id_hipotesa){
	
	$e1=0.6; 	$e2=0.3; 	$e3=0.8; 	$e4=0.8; 	$e5=0.2; 	$e6=0.1; 	$e7=0.1; 	$e8=0.4; 	$e9=0.1; 
	$e10=0.8; 	$e11=0.7;	$e12=0.7; 	$e13=0.2; 	$e14=0.1; 	$e15=0.2; 	$e16=0.5;
	$e17=0.3; 	$e18=0.6; 	$e19=0.2; 	$e20=0.2; 	$e21=0.5; 	$e22=0.1; 	$e23=0.2;
	
	//bayes_hipotesa_1
	if($id_hipotesa=="P000001"){
		
		$a=$e1+$e2+$e3+$e4+$e5+$e6+$e7+$e8+$e9;
		
		$b1=$e1/$a;
		$b2=$e2/$a;
		$b3=$e3/$a;
		$b4=$e4/$a;
		$b5=$e5/$a;
		$b6=$e6/$a;
		$b7=$e7/$a;
		$b8=$e8/$a;
		$b9=$e9/$a;
		
		$c=($e1*$b1)+($e2*$b2)+($e3*$b3)+($e4*$b4)+($e5*$b5)+($e6*$b6)+($e7*$b7)+($e8*$b8)+($e9*$b9);
		
		$d1=($e1*$b1)/$c;
		$d2=($e2*$b2)/$c;
		$d3=($e3*$b3)/$c;
		$d4=($e4*$b4)/$c;
		$d5=($e5*$b5)/$c;
		$d6=($e6*$b6)/$c;
		$d7=($e7*$b7)/$c;
		$d8=($e8*$b8)/$c;
		$d9=($e9*$b9)/$c;
		
		$nilai_final=($e1*$d1)+($e2*$d2)+($e3*$d3)+($e4*$d4)+($e5*$d5)+($e6*$d6)+($e7*$d7)+($e8*$d8)+($e9*$d9);	
	}
	
	//bayes_hipotesa_2
	elseif($id_hipotesa=="P000002"){
		
		$a=$e10+$e11+$e12+$e13+$e14+$e15+$e16;
		
		$b1=$e10/$a;
		$b2=$e11/$a;
		$b3=$e12/$a;
		$b4=$e13/$a;
		$b5=$e14/$a;
		$b6=$e15/$a;
		$b7=$e16/$a;
		
		$c=($e10*$b1)+($e11*$b2)+($e12*$b3)+($e13*$b4)+($e14*$b5)+($e15*$b6)+($e16*$b7);
		
		$d1=($e10*$b1)/$c;
		$d2=($e11*$b2)/$c;
		$d3=($e12*$b3)/$c;
		$d4=($e13*$b4)/$c;
		$d5=($e14*$b5)/$c;
		$d6=($e15*$b6)/$c;
		$d7=($e16*$b7)/$c;
		
		$nilai_final=($e10*$d1)+($e11*$d2)+($e12*$d3)+($e13*$d4)+($e14*$d5)+($e15*$d6)+($e16*$d7);
	}
	
	//bayes_hipotesa__3
	elseif($id_hipotesa=="P000003"){
		
		$a=$e17+$e18+$e19+$e20+$e21+$e22+$e23;
		
		$b1=$e17/$a;
		$b2=$e18/$a;
		$b3=$e19/$a;
		$b4=$e20/$a;
		$b5=$e21/$a;
		$b6=$e22/$a;
		$b7=$e23/$a;
		
		$c=($e17*$b1)+($e18*$b2)+($e19*$b3)+($e20*$b4)+($e21*$b5)+($e22*$b6)+($e23*$b7);
		
		$d1=($e17*$b1)/$c;
		$d2=($e18*$b2)/$c;
		$d3=($e19*$b3)/$c;
		$d4=($e20*$b4)/$c;
		$d5=($e21*$b5)/$c;
		$d6=($e22*$b6)/$c;
		$d7=($e23*$b7)/$c;
		
		$nilai_final=($e17*$d1)+($e18*$d2)+($e19*$d3)+($e20*$d4)+($e21*$d5)+($e22*$d6)+($e23*$d7);
	}
	
	//tidak_terdeteksi
	else{
		$nilai_final=0;
	}
	
	//echo $nilai_final;
	
	return $nilai_final;
}

function konversi_bulan($bln) {
	switch($bln) {
		case "1" :

		case "01" :
			$bulan = "Jan";
			break;
		case "2" :

		case "02" :
			$bulan = "Feb";
			break;
		case "3" :

		case "03" :
			$bulan = "Mar";
			break;
		case "4" :

		case "04" :
			$bulan = "Apr";
			break;
		case "5" :

		case "05" :
			$bulan = "Mei";
			break;
		case "6" :

		case "06" :
			$bulan = "Juni";
			break;
		case "7" :

		case "07" :
			$bulan = "Juli";
			break;
		case "8" :

		case "08" :
			$bulan = "Agust";
			break;
		case "9" :

		case "09" :
			$bulan = "Sept";
			break;
		case "10" :
			$bulan = "Okto";
			break;
		case "11" :
			$bulan = "Nov";
			break;
		case "12" :
			$bulan = "Des";
			break;
		default :
			$bulan = "";
	}
	return $bulan;
}

function konversi_tanggal($time) {
	list($thn, $bln, $tgl) = explode('-', $time);
	$tmp = $tgl . " " . konversi_bulan($bln) . " " . $thn;
	return $tmp;
}

function tampil_tanggal($time) {
	list($date, $time) = explode(' ', $time);
	$tmp = konversi_tanggal($date) . " " . $time;
	return $tmp;
}

?>