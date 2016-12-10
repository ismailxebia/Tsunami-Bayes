<?php
include_once '../inc/koneksi.php';
include_once '../inc/function.php';

$tabel=$_GET['tabel'];
$field=$_GET['field'];
$id=$_GET['id'];
$list=$_GET['list'];

$sql="delete from $tabel where $field='".$id."'";
$result=mysql_query($sql)or die (mysql_error());

/*echo "<meta http-equiv='refresh' content='0;
	url=home.php?list=$list>";
	exit;*/
	header("location:home.php?list=$list");



?>