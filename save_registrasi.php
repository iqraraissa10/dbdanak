<?php
//include "librari/inc.koneksidb.php";
include 'koneksi.php';
# Baca variabel Form (If Register Global ON)
$TxtNama = $_REQUEST['TxtNama'];
$RbKelamin = $_POST['cbojk'];
$TxtUsia = $_REQUEST['TxtUsia'];
$TxtAlamat = $_REQUEST['TxtAlamat'];
$TxtHandphone = $_REQUEST['TxtHandphone'];
$txtemail = $_POST['txtemail'];
$tanggalkonsul = date('Y-m-d H:i:s');
$NOIP = $_SERVER['REMOTE_ADDR'];
# Validasi Form

// $NOIP = $_SERVER['REMOTE_ADDR'];

//$sqldel = "DELETE FROM pasien WHERE noip='$NOIP'";	mysqli_query($sqldel, $koneksi);
//$sqldel = "DELETE FROM tmp_pasien WHERE noip='$NOIP'";	mysqli_query($sqldel, $koneksi);

$sql1 = " INSERT INTO pasien (nama,kelamin,usia,alamat,handphone,noip, email, tanggal) 
			VALUES ('$TxtNama','$RbKelamin', '$TxtUsia','$TxtAlamat','$TxtHandphone','$NOIP', '$txtemail', '$tanggalkonsul')";
mysqli_query($koneksi, $sql1);

$sqldel = 'DELETE FROM tmp_pasien';
mysqli_query($koneksi, $sqldel);

$sql = " INSERT INTO tmp_pasien (nama,kelamin,usia,alamat,handphone,noip, email, tanggal) 
		 	  VALUES ('$TxtNama','$RbKelamin', '$TxtUsia','$TxtAlamat','$TxtHandphone','$NOIP', '$txtemail', '$tanggalkonsul')";
mysqli_query($koneksi, $sql);

//or die ("SQL Cek 2".mysqli_error());

$sqlhapus = "DELETE FROM  diagnosa WHERE id_diagnosa='$NOIP'";
mysqli_query($koneksi, $sqlhapus) or die('SQL Error 1' . mysqli_error());

$sqlhapus2 = "DELETE FROM tmp_analisa WHERE noip='$NOIP'";
mysqli_query($koneksi, $sqlhapus2) or die('SQL Error 2' . mysqli_error());

$sqlhapus3 = "DELETE FROM tmp_gejala WHERE noip='$NOIP'";
mysqli_query($koneksi, $sqlhapus3) or die('SQL Error 3' . mysqli_error());
#	$sqlhapus4 = "DELETE FROM analisa_hasil WHERE noip='$NOIP'";
#	mysql_query($sqlhapus4, $koneksi) or die ("SQL Error 4".mysqli_error());
echo "<meta http-equiv='refresh' content='0; url=index.php?top=konsultasifm.php'>";
?>
	