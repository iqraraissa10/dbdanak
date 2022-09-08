<div class="art-post">
<div class="art-post-body">
<div class="art-post-inner art-article">
<div class="art-postcontent">
<h2 class="art-postheader"><img src="images/postheadericon.png" width="28" height="27" alt="" />Registrasi Pasien</h2>
<script type="text/javascript">
function validasi(form){
	if(form.TxtNama.value==""){
		alert("Masukkan nama !");
		form.TxtNama.focus(); return false;
		}else if(form.cbojk.value==0){
		alert("Masukkan jenis kelamin !");
		form.cbojk.focus(); return false;	
		}else if(form.TxtUsia.value==""){
			alert("Masukkan umur anda !");
			form.TxtUsia.focus(); return false;
			}else if(form.TxtAlamat.value==""){
				alert("Masukkan alamat anda !");
				form.TxtAlamat.focus(); return false;
				}else if(form.txtemail.value==""){
					alert("Masukkan email !");
					form.txtemail.focus(); return false;
					}

		form.submit();
	}
</script>
<form onSubmit="return validasi(this)" method="post" name="form1" target="_self" action="?top=save_registrasi.php">
<center>
<table width="505"  border="0">
    <tr> 
      <td colspan="2"><div align="center"><b>MASUKAN DATA PASIEN</b></div></td>
    </tr>
    <p> Konsultasi Anak kesayangan Anda dibawah ini! </p>
    <tr> 
      <td>Nama</td>
      <td> 
      <input name="TxtNama" id="TxtNama" type="text" size="35" maxlength="30"></td>
    </tr>
    <tr> 
      <td> Jenis Kelamin</td>
      <td> 
      <select name="cbojk" id="cbojk">
      <option value="0" selected="selected">- Jenis Kelamin -</option>
      <option value="Laki-laki">Laki-laki</option>
      <option value="Perempuan">Perempuan</option>
      </select>
      </td>
    </tr>
    <tr>
      <td> Usia </td>
      <td> <input type="number" name="TxtUsia" id="TxtUsia" size="35" maxlength="60"></td>
    </tr>
    <tr> 
      <td width="160">Alamat</td>
      <td width="335"> 
        <input name="TxtAlamat" id="TxtAlamat" type="text" size="35" maxlength="60"></td>
    </tr>
    <tr>
      <td>Handphone</td>
      <td> <input type="text" name="TxtHandphone" id="TxtHandphone" size="25" maxlength="60"></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" name="txtemail" id="txtemail" size="25" maxlength="25"></td>
    </tr>
    <!-- <tr>
      <td> Tanggal Konsultasi </td>
      <td> <input type="date" name="date" id="date"></td>
    </tr>  -->
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Daftar"><input type="reset" value="Reset" /></td>
    </tr>
  </table>
</form>
</center>
      </div>
                <div class="cleared"></div>
                </div>

		<div class="cleared"></div>
    </div>
</div>
