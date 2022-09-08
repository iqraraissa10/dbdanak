<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Proses Diagnosa</title>
<style type="text/css">
p{ padding-left:2px; text-indent:0px;}
</style>
</head>
<body>
<div class="konten">
<table style="font-family:Arial, Helvetica, sans-serif; font-size:11pt;" width="750" border="0" bgcolor="#0099FF" cellspacing="1" cellpadding="4" bordercolor="#0099FF">
  <tr font-size:15px; >
    <td height="32" colspan="2"><a style="color:#CF0; font-weight:bold;" href="proses-diagnosa.php?top=konsultasifm.php">&laquo;&laquo;Diagnosa Kembali</a> | 
<a style="color:#CF0; font-weight:bold;" href="proses-diagnosa.php?top=pasienfddfm.php">Kembali</a></td>
    </tr>
  <tr bgcolor="#ffffff">
    <td height="32" colspan="2"  style="color:#C60;">
<div style="width:220px; float:left;">
      <?php
      include 'koneksi.php';
      echo '<font>IDENTITAS PASIEN</font><hr>';
      $query_pasien = mysqli_query(
          $koneksi,
          'SELECT * FROM tmp_pasien ORDER BY id DESC'
      );
      $data_pasien = mysqli_fetch_array($query_pasien);
      echo 'Nama : ' . $data_pasien['nama'] . '<br>';
      echo 'Jenis Kelamin : ' . $data_pasien['kelamin'] . '<br>';
      echo 'Alamat : ' . $data_pasien['alamat'] . '<br>';
      echo 'Usia : ' . $data_pasien['usia'] . '<br>';
      echo 'Handphone : ' . $data_pasien['handphone'] . '<br>';
      echo 'Email : ' . $data_pasien['email'] . '<br>';
      echo 'Tanggal Konsultasi : ' . $data_pasien['tanggal'] . '<br>';
      ?>
</div>
<div style="width:500px; float:right;">
      <?php
      echo '<font >GEJALA YANG DIMASUKKAN</font><hr>';
      $query_gejala_input = mysqli_query(
          $koneksi,
          'SELECT * FROM gejala JOIN tmp_gejala USING (kd_gejala) WHERE tmp_gejala.kd_gejala=gejala.kd_gejala
          '
      );
      $nogejala = 0;
      while ($row_gejala_input = mysqli_fetch_array($query_gejala_input)) {
          $nogejala++;
          echo $nogejala .
              ".[$row_gejala_input[kd_gejala]]" .
              $row_gejala_input['gejala'] .
              '<br>';
      }
      ?>
</div>    
</td>
    </tr>
  
  <tr bgcolor="#FFFFFF">
    <?php
    $arrPenyakit = [];
    $arrCFKombinasiP = [];
    $arrCFKombinasiG = [];
    $arrCFGfirst = [];
    $arrCFHasil[] = [];
    $strP_Relasi = mysqli_query(
        $koneksi,
        'SELECT * FROM relasi WHERE kd_gejala IN (select kd_gejala FROM tmp_gejala) GROUP BY kd_penyakit'
    );
    
    
    while ($dataP_Relasi = mysqli_fetch_array($strP_Relasi)) {
        $arrPenyakit[] = $dataP_Relasi['kd_penyakit'];
            $dataP_Relasi['kd_penyakit'];
        //generate data gejala pada tabel relasi
        $kd_penyakitR = $dataP_Relasi['kd_penyakit'];
        $str_Gejala_R = mysqli_query(
            $koneksi,
            "SELECT * FROM relasi,gejala WHERE relasi.kd_penyakit='$kd_penyakitR' AND relasi.kd_gejala=gejala.kd_gejala ORDER BY relasi.kd_gejala ASC "
        );
        $Egejala = 1;
        while ($dataGejala_R = mysqli_fetch_array($str_Gejala_R)) {
            $dataGejala_R['kd_gejala'];
        }
        $Egejala = $Egejala + 1;
        
        $arrCFHasil[$kd_penyakitR] = $dataGejala_R;
        unset($dataGejala_R);
    }
    ?>
    </td>
    
    <td valign="top" width="350" colspan="2"><?php
    //menampilkan data penyakit yang di alami
    echo "<font color='blue'>Berdasarkan Gejala yang di alami maka kemungkinan anak anda mengalami penyakit berikut : </font><hr>";
    
    $arrNhasil = array_slice($arrCFHasil, 1);
    
    $totalCF = array_sum($arrNhasil);
    foreach ($arrNhasil as $kdP => $Np) {
        
            $sqlPHasil = mysqli_query(
                $koneksi,
                "SELECT * FROM penyakit_solusi WHERE kd_penyakit='$kdP' "
            );
            while ($dataPHasil = mysqli_fetch_array($sqlPHasil)) {
                echo "<p style='font-weight:bold; color:blue;'>Anak Mengalami Penyakit : $dataPHasil[nama_penyakit]</p>";
                echo "<p style='font-size:9pt;'><span style='font-weight:bold; color:blue;'>Definisi Penyakit :</span> $dataPHasil[definisi]</p>";
                echo "<p style='font-size:9pt;'><span style='font-weight:bold; color:blue;'>Solusi :</span> $dataPHasil[solusi]</p>";
            }
    }
    $totalCF = array_sum($arrCFHasil);
    ?></td>
    
  </tr>
  <tr bgcolor="#FFFFFF">
    <td><strong>&nbsp;</strong><br />
    </td>
    <td>&nbsp;</td>
  </tr>
</table>
<br />
<br />

</div>
</body>
</html>

