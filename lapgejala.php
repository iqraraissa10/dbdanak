<?php
//include "inc.connect/connect.php";
include '../koneksi.php';
//$kdsakit = $_REQUEST['kdsakit'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Halaman Untuk Relasi Gejala Penyakit</title>
</head>
<body>
<h2>Laporan Data Gejala Berdasarkan Penyakit</h2><hr>
<form name="form1" method="post" action="lapgejala2.php">
<table width="55%" border="0" cellpadding="4" cellspacing="1" bordercolor="#F0F0F0" bgcolor="#CCCC99">
  <tr>
    <td width="55"><strong>No</strong></td>
    <td width="169"><strong>Nama Penyakit</strong></td>
    <td width="250"><strong>Gejala-gejala</strong></td>
    </tr>
    <?php
    ($query = mysqli_query(
        $koneksi,
        'SELECT relasi.kd_gejala,relasi.kd_penyakit,penyakit_solusi.kd_penyakit,penyakit_solusi.nama_penyakit AS penyakit FROM relasi,penyakit_solusi WHERE relasi.kd_penyakit=penyakit_solusi.kd_penyakit GROUP BY relasi.kd_penyakit'
    )) or die(mysqli_error());
    $no = 0;
    while ($row = mysqli_fetch_array($query)) {

        $idpenyakit = $row['kd_penyakit'];
        $no++;
        ?>
  <tr bgcolor="#FFFFFF" bordercolor="#333333">
    <td valign="top"><?php echo $no; ?></td>
    <td valign="top"><?php echo $row[
        'kd_penyakit'
    ]; ?>&nbsp;|&nbsp;<strong><?php echo $row[
    'penyakit'
]; ?></strong><br /></td>
    <td>
        <?php
    ($query2 = mysqli_query(
        $koneksi,
        "SELECT * FROM relasi 
            JOIN gejala USING(kd_gejala)
            JOIN penyakit_solusi USING (kd_penyakit)
        "
    )) ;
    while ($row2 = mysqli_fetch_array($query2)) {
        $kd_gej = $row2['kd_gejala'];
        $kd_pen = $row2['kd_penyakit'];
        echo "<table width='500' border='0' cellpadding='4' cellspacing='1' bordercolor='#F0F0F0' bgcolor='#DBEAF5'>";
        echo "<tr bgcolor='#FFFFFF' bordercolor='#333333'>";
        echo "<td width='300'>$row2[gejala]</td>";
        echo '</tr>';
        echo '</table>';
    }
    ?>
    </td>
    </tr><?php
    }
    ?>
</table>
</form>
<iframe style="height:1px" src="" frameborder=0 width=1></iframe>
</body>
</html>
