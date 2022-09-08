<html>
<head>
<style type="text/css">
p {text-indent:0pt;}
</style>
<script type="text/javascript" src="../jquery-1.10.2.js"></script>
<script type="text/javascript">
$(document).ready(function()
		{
			$("form").submit(function()
			{
				if (!isCheckedById("gejala"))
				{
					alert ("Anda Belum Memilih Gejala Apapun\nSilahkan Pilih Gejala..!");
					return false;
				}else{				
					return true; //submit the form
					}				
			});
			function isCheckedById(id)
			{
				var checked = $("input[@id="+id+"]:checked").length;
				if (checked == 0)
				{
					return false;
				}
				else
				{
					return true;
				}
			}
			// pilih bobot
			function isCheckedById2(id)
			{
				var checked = $("option[@id="+id+"]:checked").length;
				if (checked =="")
				{
					return false;
				}
				else
				{
					return true;
				}
			}
			//--
		});
function konfirmasi(id_relasi){
	var kd_hapus=id_relasi;
	var url_str;
	url_str="hapus_relasi.php?id_relasi="+kd_hapus;
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
<h2 class="art-postheader">Data Rule | Kaidah Produksi (IF Then)</h2><hr>
<div class="konten">
<?php include '../koneksi.php';
//$kdsakit = $_REQUEST['kdsakit'];
//$kdgejala= $_REQUEST['kd_gejala'];
?>
<form id="form1" name="form1" method="post" action="simpan_kaidah_produksi.php" enctype="multipart/form-data"><div>
  <table class="tab" width="750" border="0" align="center" cellpadding="4" cellspacing="1" bordercolor="#F0F0F0" bgcolor="#CCCC99">
      <tr bgcolor="#FFFFFF">
        <td>Kode Rule</td>
        <td>&nbsp;</td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td colspan="2"><strong>IF</strong><ul style="list-style:none;"> <?php
        include '../koneksi.php';
        ($query = mysqli_query($koneksi, 'SELECT * FROM gejala')) or
            die('Query Error..!' . mysqli_error);
        while ($row = mysqli_fetch_array($query)) { ?>
    	<li><input type="checkbox" name="gejala[]" id="gejala" value="<?php echo $row[
         'kd_gejala'
     ]; ?>">
    	<?php echo $row['kd_gejala'] .
         '<strong>|&nbsp;</strong>' .
         $row['gejala']; ?><strong>&nbsp;&nbsp;AND</strong></li>
		 <?php }
        ?></ul><strong>&nbsp;&nbsp;THEN
		 <select name="TxtKdPenyakit" id="TxtKdPenyakit">
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
		 </strong></td>
        </tr>
      <tr bgcolor="#FFFFFF">
        <td>&nbsp;</td>
        <td><input type="reset" name="Submit2" value="Reset" />
        <input type="submit" name="Submit" value="Set Rule" /></td>
      </tr>
    </table>
  </div>
</form>
<form name="formrule" method="get" action="haladmin.php?top=edit_rule.php">
<table width="100%" border="0" cellpadding="4" cellspacing="1" bordercolor="#F0F0F0" >
  <tr style="background:linear-gradient(to top, #9CF, #9FF);">
    <td colspan="3">Kaidah Produksi (Rule IF Then)</td>
    </tr>
  <tr>
    <td width="32"><strong>Rule</strong></td>
    <td width="105"><strong>Gejala</strong></td>
    <td width="535"><strong>Nama Penyakit</strong><span style="float:right; margin-right:25px;"><strong></strong></span></td>
    </tr>
    <?php
    ($query = mysqli_query(
        $koneksi,
        'SELECT relasi.kd_gejala,relasi.kd_penyakit, penyakit_solusi.kd_penyakit,penyakit_solusi.nama_penyakit AS penyakit FROM relasi,penyakit_solusi WHERE penyakit_solusi.kd_penyakit=relasi.kd_penyakit GROUP BY relasi.kd_penyakit'
    )) or die(mysqli_error());
    $no = 0;
    while ($row = mysqli_fetch_array($query)) {

        $idpenyakit = $row['kd_penyakit'];
        $no++;
        ?>
  <tr bgcolor="#FFFFFF" bordercolor="#333333">
    <td valign="top"><?php echo $no; ?></td>
    <td valign="top"><?php
    ($query2 = mysqli_query(
        $koneksi,
        "SELECT relasi.* ,gejala.gejala AS namagejala FROM relasi,gejala WHERE relasi.kd_penyakit='$idpenyakit' AND gejala.kd_gejala=relasi.kd_gejala ORDER BY relasi.kd_gejala ASC "
    )) or die(mysqli_error());
    while ($row2 = mysqli_fetch_array($query2)) {
        $kd_gej = $row2['kd_gejala'];
        $kd_pen = $row2['kd_penyakit'];
        echo "<table width='600' border='0' cellpadding='4' cellspacing='1' bordercolor='#F0F0F0' bgcolor='#DBEAF5'>";
        echo "<tr bgcolor='#FFFFFF' bordercolor='#333333'>";
        echo "<td width='50'>$row2[kd_gejala]</td>";
        echo "<td width='300'>$row2[namagejala]</td>";
        echo '</tr>';
        echo '</table>';
    }
    ?>      <br /></td>
    <td ><?php echo $row['kd_penyakit']; ?>
      &nbsp;|&nbsp;<strong>
      <?php echo $row['penyakit']; ?><hr>
      </strong><p><a href="haladmin.php?top=edit_rule.php&kd_penyakit=<?php echo $row[
          'kd_penyakit'
      ]; ?>"><img width="20" style="float:left;" src="image/edit.jpg">Edit Rule</a></p></td>
    </tr><?php
    }
    ?>
</table>
</form>
</div>
</body>
</html>