<?php include '../koneksi.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Data Rule</title>
<link rel="stylesheet" type="text/css" href="../jquery-ui.css" />
<script type="text/javascript" src="../jquery-1.10.2.js"></script>
<script type="text/javascript" src="../jquery-ui.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('div.TxtKdPenyakit option[value="<?php echo $_GET[
     'kd_penyakit'
 ]; ?>').prop("selected", true);
	$('TxtKdPenyakit').val("<?php echo $_GET['kd_penyakit']; ?>");
	$('div.idcf option[value="<?php echo $_GET['cf_p']; ?>').prop("selected", true);
	$('idcf').val("<?php echo $_GET['cf_p']; ?>");
	var gejala2="1";
	if(gejala2=="0"){ $("#gejala2").prop('checked', false);}else{ $("#gejala2").prop('checked', true);}
	//jns_tanaman_sbl
	 <?php
  $kd_penyakit = $_GET['kd_penyakit'];
  $query_G = mysqli_query(
      $koneksi,
      "SELECT * FROM relasi WHERE kd_penyakit='$kd_penyakit' "
  );
  while ($data_G = mysqli_fetch_array($query_G)) { ?>
		var gejala<?php echo $data_G['kd_gejala']; ?>;
		gejala<?php echo $data_G['kd_gejala']; ?>="<?php echo $data_G['kd_gejala']; ?>";
		//alert(gejala<?php echo $data_G['kd_gejala']; ?>);
		if(gejala<?php echo $data_G[
      'kd_gejala'
  ]; ?>=="0"){ $("#gejala[<?php echo $data_G[
    'kd_gejala'
]; ?>]").prop('checked', false);}else{ $("#gejala[<?php echo $data_G[
    'kd_gejala'
]; ?>]").prop('checked', true);}
		<?php }
  ?>
});
function kembali(){
	window.location="haladmin.php?top=rule_kaidah_produksi.php";
	}
</script>
</head>
<body>
<form id="form1" name="form1" method="post" action="update_kaidah_produksi.php" enctype="multipart/form-data"><div>
  <table class="tab" width="650" border="0" align="center" cellpadding="4" cellspacing="1" bordercolor="#F0F0F0" bgcolor="#CCCC99">
      <tr bgcolor="#FFFFFF">
        <td style="background:linear-gradient(to top, #0CC, #09C);">Kode Rule : <?php echo $_GET[
            'kd_penyakit'
        ]; ?></td>
        <td style="background:linear-gradient(to top, #0CC, #09C);"><strong>Edit Data Basis Pengetahuan</strong></td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td colspan="2"><ul style="list-style:none;"><strong>
          
          IF</strong> <?php
          include '../koneksi.php';
          ($query = mysqli_query($koneksi, 'SELECT * FROM gejala')) or
              die('Query Error..!' . mysqli_error);
          while ($row = mysqli_fetch_array($query)) {

              //mencari data gejala yang di edit
              $kd_penyakit = $_GET['kd_penyakit'];
              $kd_gejala = $row['kd_gejala'];
              $kueri = mysqli_query(
                  $koneksi,
                  "SELECT * FROM relasi WHERE kd_penyakit='$kd_penyakit' AND kd_gejala='$kd_gejala' ORDER BY kd_gejala desc "
              );
              $edit = mysqli_fetch_array($kueri);
              $checked = explode(', ', $edit['kd_gejala']);

              //#end data gejala
              ?>
    	<li><input type="checkbox" name="gejala[]" id="gejala" value="<?php echo $row[
         'kd_gejala'
     ]; ?>" <?php in_array($row['kd_gejala'], $checked)
    ? print 'checked'
    : ''; ?>>
    	<?php echo $row['kd_gejala'] .
         '<strong>|&nbsp;</strong>' .
         $row['gejala']; ?><strong>&nbsp;&nbsp;AND</strong></li>
		 <?php
          }
          ?></ul>
         
         <strong>&nbsp;&nbsp;THEN
		 <div class="TxtKdPenyakit"><select name="TxtKdPenyakit" id="TxtKdPenyakit">
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
	      </select>
          
          		   </select>
		 </div>
	    </strong></td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td>&nbsp;</td>
        <td><input type="reset" name="Submit2" value="Back" onclick="kembali();" /><input type="submit" name="Submit" value="Update Rule" /></td>
      </tr>
    </table>
  </div>
</form>
</body>
</html>