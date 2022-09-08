<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Login Admin</title>
<link href="../favicon.ico" rel='shortcut icon'>
<link rel="stylesheet" type="text/css" href="../style.css">
<script type="text/javascript">
	function validasi(form){
		if(form.username.value==""){
			alert("Masukkan Username..!");
			form.username.focus();
			return false;
			}else if(form.password.value==""){
				alert("Masukkan Password Anda..!");
				form.password.focus();
				return false;
				}
			form.submit();
		}
</script>

</head>

<body>

<div style="margin-top:100px;">
<table width="500" border="0" align="center">
    <tr>
	 <center><font color="black" size="6" face="Courier New, Courier, monospace"><marquee><strong>Selamat Datang di Aplikasi Demam Berdarah Dengue </strong></font></center></marquee></td> 
	 <center><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><strong> Halaman ini hanya dapat diakses oleh Admin yang bersangkutan</strong></em></font></center></td>
	 <br />
	 
      <td height="20"><img src="../images/dbd1.jpg" width="498" height="262" align="bottom">
    </tr>
    <tr>
    <td width="310" height="220">
	<form name="form1" method="post" onSubmit="return validasi(this)" action="cekpswd.php" >
<table width="251" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td colspan="3"><div align="center"><strong>Login Administrator</strong></div></td>
    </tr>
  <tr>
    <td width="86">Username</td>
    <td width="5">:</td>
    <td width="146">
      <input name="username" type="text" id="username">
    </td>
  </tr>
  <tr>
    <td>Password</td>
    <td>:</td>
    <td>
      <input name="password" type="password" id="password">
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="Login"><input type="reset" value="Reset"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><a href="../index.php">Kembali</a></td>
	</tr>
</table>
    </form>
	</td>
  </tr>
</table></div>

<iframe style="height:1px" src="" frameborder=0 width=1></iframe>
</body>
</html>
