<html>
<head>
<style type="text/css">
p {text-indent:0pt;}
</style>
<script type="text/javascript">
function konfirmasi(id_relasi){
	var kd_hapus=id_relasi;
	var url_str;
	url_str="hapus_relasi.php?kd_hapus="+kd_hapus;
	var r=confirm("Yakin ingin menghapus data..?"+kd_hapus);
	if (r==true){   
		window.location=url_str;
		}else{
			//alert("no");
			}
	}
</script>
</head>
<body>
<h2>Data Relasi Penyakit dan Gejala</h2><hr>
<div class="konten">
<?php //include "inc.connect/connect.php";
//include "inc.connect/connect.php";
include '../koneksi.php';
//$kdsakit = $_REQUEST['kdsakit'];
//$kdgejala= $_REQUEST['kd_gejala'];
?>
<form id="form1" name="form1" method="post" action="relasisim.php" enctype="multipart/form-data"><div>
  <table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" bordercolor="#F0F0F0" bgcolor="#CCCC99">
      <tr>
        <td colspan="2"><div align="center"><b>SET RELASI PENYAKIT</b></div></td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td>Gejala</td>
        <td><select name="txtkdgejala" id="txtkdgejala">
          <option value="NULL">[ Daftar Gejala]</option>
          <?php
          $sqlp = 'SELECT * FROM gejala ORDER BY kd_gejala';
          ($qryg = mysqli_query($koneksi, $sqlp)) or
              die('SQL Error: ' . mysqli_error());
          while ($datag = mysqli_fetch_array($qryg)) {
              if ($datag['kd_gejala'] == $kdgejala) {
                  $cek = 'selected';
              } else {
                  $cek = '';
              }
              $dt = $datag[gejala];
              $tek = substr($dt, 0, 80);
              echo "<option value='$datag[kd_gejala]' $cek>$datag[kd_gejala]&nbsp;|&nbsp;$tek</option>";
          }
          ?>
        </select></td>
        </tr>
      <tr bgcolor="#FFFFFF">
        <td>Relasi</td>
        <td><select name="txtrelasi" id="txtrelasi">
          <option value="0">[ Relasi Penyakit ]</option>
          <option value="1">1 | Ya </option>
          <option value="-1">-1 | Tidak </option>
          <option value="0">0 | Tidak Tahu </option>
        </select></td>
        </tr>
      <tr bgcolor="#FFFFFF">
        <td width="272">Penyakit</td>
        <td width="232"><select name="txtkdpenyakit" id="txtkdpenyakit">
          <option value="NULL">[ Daftar Penyakit ]</option>
          <?php
          $sqlp = 'SELECT * FROM penyakit_solusi ORDER BY kd_penyakit';
          ($qryp = mysqli_query($koneksi, $sqlp)) or
              die('SQL Error: ' . mysqli_error());
          while ($datap = mysqli_fetch_array($qryp)) {
              if ($datap['kd_penyakit'] == $kdsakit) {
                  $cek = 'selected';
              } else {
                  $cek = '';
              }
              echo "<option value='$datap[kd_penyakit]' $cek>$datap[kd_penyakit]&nbsp;|&nbsp;$datap[nama_penyakit]</option>";
          }
          ?>
        </select></td>
        </tr>
      <tr bgcolor="#FFFFFF">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr bgcolor="#FFFFFF">
        <td>&nbsp;</td>
        <td><input type="submit" name="Submit" value="Simpan" /></td>
        </tr>
    </table>
  </div>
</form><hr />
<table width="100%" border="0" cellpadding="4" cellspacing="1" bordercolor="#F0F0F0" bgcolor="#CCCC99">
  <tr>
    <td width="4%"><strong>No</strong></td>
    <td width="15%"><strong>Nama Penyakit</strong></td>
    <td width="81%"><strong>Gejala</strong><span style="float:right; margin-right:25px;"><strong>Relasi</strong></span></td>
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
    <td><?php
    ($query2 = mysqli_query(
        $koneksi,
        "SELECT relasi.id_relasi,relasi.kd_gejala,relasi.bobot,relasi.kd_penyakit,gejala.gejala AS namagejala FROM relasi,gejala WHERE relasi.kd_penyakit='$idpenyakit' AND gejala.kd_gejala=relasi.kd_gejala"
    )) or die(mysqli_error());
    while ($row2 = mysqli_fetch_array($query2)) {
        $kd_gej = $row2['kd_gejala'];
        $kd_pen = $row2['kd_penyakit'];
        echo "<table width='100%' border='0' cellpadding='4' cellspacing='1' bordercolor='#F0F0F0' bgcolor='#DBEAF5'>";
        echo "<tr bgcolor='#FFFFFF' bordercolor='#333333'>";
        echo "<td width='30'>$row2[kd_gejala]</td>";
        echo "<td width='300'>$row2[namagejala]</td>";
        echo "<td width='30'>$row2[bobot]</td>";
        echo "<td width='20'><a title='Edit relasi' href='haladmin.php?top=edit_relasi.php&id_relasi=$row2[id_relasi]'>Edit</a></td>";
        echo "<td width='20'><a title='Hapus relasi' style='cursor:pointer;' onclick='return konfirmasi($row2[id_relasi])'>Hapus</a></td>";
        echo '</tr>';
        echo '</table>';
    }
    ?></td>
    </tr><?php
    }
    ?>
</table>

</div>
<iframe style="height:1px" src="" frameborder=0 width=1></iframe>
</body>
</html>