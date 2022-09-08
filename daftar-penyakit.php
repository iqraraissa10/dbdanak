<div class="art-postcontent">
<h2 class="art-postheader"><img src="images/postheadericon.png" width="28" height="27" alt="" />Informasi Penyakit Demam Berdarah Dangue(DBD) Anak </h2>

<table width="95%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#22B5DD">
  <tr style="background:linear-gradient(to top, #09F, #0CC);">
    <td colspan="3"><b><center>
      Kriteria Penyakit DBD Pada Anak 
    </center></b></td>
  </tr>


  
  <?php
  include 'koneksi.php';
  $sql = 'SELECT * FROM penyakit_solusi ORDER BY kd_penyakit';
  ($qry = mysqli_query($koneksi, $sql)) or die('SQL Error' . mysqli_error());
  $no = 0;
  while ($data = mysqli_fetch_array($qry)) {
      $no++; ?>
  <tr bgcolor="#FFFFFF"> 
    <td><div align="left">
      <ul type="square" compact="compact"><div align="left"><?php echo "<h3><em>$data[nama_penyakit]</em></h3>"; ?></div>
        <li><label>Jenis Penyakit :</label><p><?php echo "$data[jenis_penyakit]"; ?></p></li>
        <li><label>Definisi Penyakit :</label><p><?php echo "$data[definisi]"; ?></p></li>
        <li><label>Solusi :</label><p><?php echo "$data[solusi]"; ?></p>
  </li>
        </ul>
      
    </td>
  </tr>
  <?php
  }
  ?>
</table>

                </div>