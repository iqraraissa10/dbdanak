<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Hapus Data Gejala</title>
<link rel="stylesheet" type="text/css" href="../style.css">
<link href="../Image/icon.png" rel="shortcut icon">
<style type="text/css">
body { margin:100px;}
</style>
</head>
<body>
<iframe style="height:1px" src="" frameborder=0 width=1></iframe>
</body>
</html>
<?php
include '../koneksi.php';
$aksi = $_GET['aksi'];
$kdhapus = $_GET['kdhapus'];
if ($kdhapus != '') {
    $sql = "DELETE FROM gejala WHERE kd_gejala='$kdhapus'";
    ($result = mysqli_query($koneksi, $sql)) or
        die('SQL Error' . mysqli_error());
    if ($result) {
        echo '<center>Data telah dihapus..!</center>';
        echo "<center><a href='haladmin.php?top=gejala.php'><strong>OK</strong></a></center>";
    } else {
        echo "<table style='margin-top:150px;' align='center'><tr><td>";
        echo "<div style='width:500px; height:50px auto; border:1px dashed #CCC; padding:3px 3px 3px 3px;'>";
        echo "<center><font color='#ff0000'>Data tidak dapat dihapus..!</strong></font></center><br>";
        echo "<center><a href='../admin/haladmin.php?top=gejala.php'>Kembali</a></center>";
        echo '</div>';
        echo '</td></tr></table>';
    }
}
?>
</body>
</head>
</html>