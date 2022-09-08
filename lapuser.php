<?php
//include "inc.connect/connect.php";
include '../koneksi.php'; ?>
<html>
<head>
<title>Tampilan Data Penyakit</title>
<script type="text/javascript">
function konfirmasi(id_user){
  var kd_hapus=id_user;
  var url_str;
  url_str="hapus_user.php?id_user="+kd_hapus;
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
<h2>Laporan Data Pasien</h2><hr>
<table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#22B5DD">
  <tr style="background:linear-gradient(to top, #9CF, #9FF);"> 
    <td colspan="9"><div align="center"><strong>Laporan Pasien </strong></div></td>
  </tr>
  <tr style="background:linear-gradient(to top, #9CF, #9FF);"> 
    <td width="29"><div align="center"><strong>No</strong></div></td>
    <td width="147"><div align="center"><b>Nama</b></div></td>
    <td width="74"><div align="center"><strong>Email</strong></div></td>
    <td width="166" align="center"><div align="center"><strong>Alamat</strong></div></td>
    <td width="235" align="center"><div align="center"><strong>Penyakit Yang diderita </strong></div></td>
    <td width="150" align="center"><strong>Tanggal Diagnosa</strong> </td>
    <td width="150" align="center"><strong>Aksi</strong> </td>
  </tr>
  <?php
  $qry = mysqli_query(
      $koneksi,
      'SELECT * FROM analisa_hasil JOIN penyakit_solusi USING (kd_penyakit)'
  );
  $no = 0;
  while ($data = mysqli_fetch_array($qry)) {
      $no++; ?>
    <tr bgcolor="#FFFFFF"> 
      <td><?php echo $no; ?></td>
      <td><?php echo $data['nama']; ?></td>
      <td><?php echo $data['email']; ?></td>
      <td><?php echo $data['alamat']; ?></td>
      <td>
        <?php echo '<p> ' .
            $data['nama_penyakit'] .
            ' (' .
            $data['kd_penyakit'] .
            ')</p>'; ?>
      </td>
      <td><?php echo $data['tanggal']; ?>&nbsp;</td>
      <td>
        <a title="hapus pengguna" style="cursor:pointer;" onClick="return konfirmasi('<?php echo $data[
            'id'
        ]; ?>')">
          <img src="image/hapus.jpg" width="16" height="16" >
        </a>
      </td>
    </tr>
  <?php
  }
  ?>
</table>
</body>
</html>
