<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Simpan Data Penyakit</title>
<link rel="stylesheet" type="text/css" href="../style.css">
<link href="../Image/icon.png" rel="shortcut icon">
<style type="text/css">
body { margin:100px;}
</style>
</head>
<body>
<?php
include '../koneksi.php';
$kd_gejala = $_REQUEST['kd_gejala2'];
$gejala = $_REQUEST['gejala'];
$sql = "UPDATE gejala SET gejala='$gejala' WHERE kd_gejala='$kd_gejala'";
($result = mysqli_query($koneksi, $sql)) or die('SQL Error' . mysqli_error());
if ($result) {
    echo '<center>Data Telah Berhasil Diubah</center>';
    echo "<center><a href='haladmin.php?top=gejala.php'>OK</a></center>";
} else {
    echo "<table style='margin-top:150px;' align='center'><tr><td>";
    echo "<div style='width:500px; height:50px auto; border:1px dashed #CCC; padding:3px 3px 3px 3px;'>";
    echo "<center><font color='#ff0000'>Data tidak dapat di Update..!</strong></font></center><br>";
    echo "<center><a href='../admin/haladmin.php?top=gejala.php'>Kembali</a></center>";
    echo '</div>';
    echo '</td></tr></table>';
}
?>
</body>
</html>
