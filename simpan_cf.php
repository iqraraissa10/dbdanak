<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Simpan Data CF</title>
<link rel="stylesheet" type="text/css" href="../style.css">
<link href="../Image/icon.png" rel="shortcut icon">
<style type="text/css">
body { margin:100px;}
</style>
</head>
<body>
    <?php
    include '../koneksi.php';
    $certainty_term = $_POST['certainty_term'];
    $nilai_mbmd = $_POST['nilai_mbmd'];

    $perintah = "INSERT INTO nilai_cf_penyakit (certainty_term,nilai_mbmd) VALUES ('$certainty_term','$nilai_mbmd')";
    ($berhasil = mysqli_query($koneksi, $perintah)) or
        die(' Data tidak masuk database / data telah ada ' . mysqli_error());
    if ($berhasil) {
        echo '<center><b>Data Berhasil Disimpan </b></center>';
        //header("location: haladmin.php?top=_cf.php");
        echo "<center><a href='../admin/haladmin.php?top=_cf.php'>OK</a></center>";
    } else {
        echo "<center><font color='#ff0000'><strong>Penyimpanan Gagal</strong></font></center><br>";
        echo "<center><a href='/admin/haladmin.php?top=_cf.php'>Kembali</a></center>";
    }
    ?>

</body>
</html>	  