<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Jenis Penyakit</title>
<script type="text/javascript" src="../jquery.js"></script>
<script type="text/javascript" src="../jquery.truncatable.js"></script>
<script type="text/javascript">
function validasi(form){
	if(form.kd_penyakit.value==""){
		alert("Masukkan Kode Penyakit..!");
		form.kd_penyakit.focus(); return false;
		}else if(form.nama_penyakit.value==""){
		alert("Masukkan Nama Penyakit..!");
		form.nama_penyakit.focus(); return false;
		}else if(form.jenis_penyakit.value==""){
		alert("Masukkan Jenis Penyakit..!");
		form.jenis_penyakit.focus(); return false;
		}else if(form.definisi.value==""){
		alert("Masukkan Definisi Penyakit..!");
		form.definisi.focus(); return false;
		}else if(form.solusi.value==""){
		alert("Masukkan Solusi Penyakit..!");
		form.solusi.focus();return false	
		}
	}
function konfirmasi(kd_penyakit){
	var kd_hapus=kd_penyakit;
	var url_str;
	url_str="hpspenyakit.php?kdhapus="+kd_hapus;
	var r=confirm("Yakin ingin menghapus data..?"+kd_hapus);
	if (r==true){   
		window.location=url_str;
		}else{
			//alert("no");
			}
	}
	//expande text
$(function(){
	 $('.text').truncatable({	limit: 100, more: '[<strong style="color:red;">&raquo;&raquo;&raquo;</strong>]', less: true, hideText: '[<strong>&laquo;&laquo;&laquo;</strong>]' }); 
	});
</script>
</head>
<body>
<h2>Data Penyakit dan Solusi Penanganannya</h2><hr>
<form name="form3" method="post" onSubmit="return validasi(this);" action="simpanpenyakit.php">
<center>
<table width="563" border="0" cellpadding="2" cellspacing="1">
  <tr align="center">
    <td colspan="3"><strong><center>Input Data Penyakit</center></strong></td>
  </tr>
  <tr>
    <td width="115">Kode Penyakit </td>
    <td width="8">:</td>
    <td width="424">
      <input name="kd_penyakit" type="text" id="kd_penyakit" size="4" maxlength="4">
</td>
  </tr>
  <tr valign="top">
    <td>Nama Penyakit</td>
    <td>:</td>
    <td>
      <input type="text" name="nama_penyakit" id="nama_penyakit" size="70" maxlength="100">
    </td>
  </tr>
  <tr valign="top">
  	<td>Jenis Penyakit</td>
	<td>:</td>
	<td>
		<select name="jenis_penyakit"> 
		<option>Demam Berdarah Dangue (DBD) DEN-1</option>
    <option>Demam Berdarah Dangue (DBD) DEN-2</option>
    <option>Demam Berdarah Dangue (DBD) DEN-3</option>
    <option>Demam Berdarah Dangue (DBD) DEN-4</option>
    	<option></option>
		</select>
	</td>
	</tr>
  <tr valign="top">
    <td>Definisi</td>
    <td>:</td>
    <td>
      <textarea name="definisi" id="definisi" rows="3" cols="70"></textarea>
    </td>
  </tr>
  <tr valign="top">
    <td>Solusi</td>
    <td>:</td>
    <td>
<textarea name="solusi" id="solusi" rows="3" cols="70"></textarea>    
</td>
  </tr>
  <tr>
    <td height="23">&nbsp;</td>
    <td>&nbsp;</td>
    <td>
      <input name="simpan" type="Submit" id="simpan" value="Simpan">
      <input type="submit" name="Submit" value="Reset">
    </td>
  </tr>
</table>
</form>
</center>
<br>
<table id="tabel" width="100%" cellpadding="3" cellspacing="0" border="1" align="center">
  <tr valign="top" style="background:linear-gradient(to top, #9CF, #9FF);">
  	<td width="30"><strong>No.</strong></td>
    <td width="80"><strong>Kode Penyakit </strong></td>
    <td width="100"><strong>Nama Penyakit</strong></td>
	<td width="80"><strong>Jenis Penyakit</strong></td>
	<td width="150"><strong>Definisi</strong></td>
    <td width="150"><strong>Solusi</strong></td>
    <td width="48"><strong>Edit</strong></td>
    <td width="53"><strong>Hapus</strong></td>
  </tr>
  <?php
  //include "inc.connect/connect.php";
  //include "../librari/inc.koneksidb.php";
  include '../koneksi.php';
  $sql = 'SELECT * FROM penyakit_solusi ORDER BY kd_penyakit';
  ($qry = mysqli_query($koneksi, $sql)) or die('SQL Error' . mysqli_error());
  $no = 0;
  while ($data = mysqli_fetch_array($qry)) {
      $no++; ?>
  <tr valign="baseline">
 	<td><?php echo $no; ?> </td>
    <td><?php echo $data['kd_penyakit']; ?></td>
    <td><?php echo $data['nama_penyakit']; ?></td>
	<td><?php echo $data['jenis_penyakit']; ?> </td>
	<td>
	<p class="text">
    <?php
    $str = $data['definisi'];
    $teks = substr($str, 0, 150);
    echo $str;
    ?>
    </p>
    </td>
    <td><p class="text"><?php echo $data['solusi']; ?></p></td>
    <td><a title="Edit Penyakit" href="edpenyakit.php?kdubah=<?php echo $data[
        'kd_penyakit'
    ]; ?>"><img src="image/edit.jpg" width="16" height="16" border="0"></a></td>
    <td><a title="Hapus Penyakit" style="cursor:pointer;" onclick="return konfirmasi('<?php echo $data[
        'kd_penyakit'
    ]; ?>');"><img src="image/hapus.jpg" width="16" height="16" ></a>
    </td>
  </tr>
  <?php
  }
  ?>
</table>
</body>
</html>
