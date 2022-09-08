<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>TubEx System | Admin </title>
<link href="/image/aq.JPG" rel='shortcut icon'>
<link href="../style.css" type="text/css" rel="stylesheet">
<style>
<!--
body
{
background-image:url(/image/background.jpg);
background-repeat:no-repeat;
background-attachment:fixed;
margin:100px;
}
</style>
</head>
<body>
<iframe style="height:1px" src="" frameborder=0 width=1></iframe>
</body>
</html>
<?php
//include "connect/config.php";
//include_once('index.php');
include '../koneksi.php';
$kd_penyakit = $_POST['kd_penyakit'];
$penyakit = $_POST['in_penyakit'];
$jenis_penyakit = $_POST['jenis_penyakit'];
$definisi = $_POST['in_definisi'];
$solusi = $_POST['in_solusi'];
$sql = "UPDATE penyakit_solusi SET nama_penyakit='$penyakit', jenis_penyakit='$jenis_penyakit', definisi='$definisi', solusi='$solusi' WHERE kd_penyakit='$kd_penyakit'";
($result = mysqli_query($koneksi, $sql)) or die('SQL Error' . mysqli_error());
if ($result) {
    echo '<center>Data Telah Berhasil Diubah</center>';
    echo "<center><a href='haladmin.php?top=penyakit_solusi.php'>OK</a></center>";
} else {
    echo "<center><font color='#ff0000'>Error update</font></center>";
    echo "<center><a href='haladmin.php?top=penyakit_solusi.php'>Kembali</a></center>";
}


?>
