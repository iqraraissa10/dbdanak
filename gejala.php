<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript">
function validasi(form){
  if(form.kd_gejala.value==""){
    alert("Masukkan kode gejala..!");
    form.kd_gejala.focus(); return false;
    }else if(form.gejala.value==""){
    alert("Masukkan gejala..!");
    form.gejala.focus(); return false;  
    }else if(form.txtkdpenyakit.value==0){
      alert("Masukkan penyakit..!"); return false;
      form.txtkdpenyakit.focus();
      }
    form.submit();
  }
function konfirmasi(kd_gejala){
  var kd_hapus=kd_gejala;
  var url_str;
  var aksi="gejala";
  //alert(kd_hapus);
  url_str="hpsgejala.php?kdhapus="+kd_hapus+"&aksi="+aksi;
  var r=confirm("Yakin ingin menghapus data..?"+kd_hapus);
  if (r==true){   
    window.location=url_str;
    }else{
      //alert("no");
      }
  }
function hapus (xkd_gejala){
  var kd=xkd_gejala
  alert(kd);
  }
</script>
</head>
<body>
<h2>Data Gejala-Gejala </h2><hr>
<form name="form3" onSubmit="return validasi(this);" method="post" action="simpangejala.php">
<table width="100%" border="0" align="center">
  <tr>
    <td colspan="3"><div align="center"><strong>Input Data Gejala</strong></div></td>
  </tr>
  <tr>
    <td width="165">Kode gejala </td>
    <td width="15">:</td>
    <td width="888">
      <input name="kd_gejala" type="text" id="kd_gejala" size="4" maxlength="4">
    </td>
  </tr>
  <tr>
    <td> Gejala </td>
    <td>:</td>
    <td>
      <textarea name="gejala" cols="55" id="gejala"></textarea>
    </td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
      <input name="simpan" type="submit" id="simpan" value="Simpan">
       <input type="submit" name="Submit" value="Reset">
    </td>
  </tr>
</table>
</form>
<br>
<table width="100%" border="0" cellpadding="4" cellspacing="1" bordercolor="#F0F0F0" bgcolor="#CCCC99">
  <tr style="background:linear-gradient(to top, #9CF, #9FF);">
    <td width="74"><strong>Kode Gejala</strong></td>
    <td width="756"><strong>Gejala</strong></td>
    <td><span style="float:right; margin-right:25px;"><strong>Aksi</strong></span></td>
    </tr>
    <?php
    ($query = mysqli_query($koneksi, 'SELECT * FROM gejala')) or
        die(mysqli_error());
    $no = 0;
    while ($row = mysqli_fetch_array($query)) { ?>
      <tr bgcolor="#FFFFFF" bordercolor="#333333">
        <td valign="top">
          <?php echo $row['kd_gejala']; ?>
        </td>
        <td>
          <?php echo $row['gejala']; ?>
        <td width="224">
          <a title="Edit Data" href="edgejala.php?kdubah=<?php echo $row[
              'kd_gejala'
          ]; ?>">
            <img src="image/edit.jpg" width="16" height="16" border="0">
            Edit
          </a> 
            | 
          <img src="image/hapus.jpg" width="16" height="16" border="0">
          <a style="cursor:pointer;" onclick="return konfirmasi('<?php echo $row[
              'kd_gejala'
          ]; ?>');">
            Hapus
          </a>
        </td>
      </tr>
    <?php }
    ?>
</table>
<p>&nbsp; </p>
</body>
</html>