<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <!--
    Created syivasha
    -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Registrasi Pasien</title>
    <meta name="description" content="Description" />
    <meta name="keywords" content="Keywords" />


    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="script.js"></script>
</head>
<body>
<div id="art-page--glare">
    <div id="art-page-background-glare-image"> </div>
</div>
<div id="art-main">
    <div class="art-sheet">
        <div class="art-sheet-tl"></div>
        <div class="art-sheet-tr"></div>
        <div class="art-sheet-bl"></div>
        <div class="art-sheet-br"></div>
        <div class="art-sheet-tc"></div>
        <div class="art-sheet-bc"></div>
        <div class="art-sheet-cl"></div>
        <div class="art-sheet-cr"></div>
        <div class="art-sheet-cc"></div>
        <div class="art-sheet-body">
        <div class="art-header">
        <div class="art-header-clip">
        <div class="art-header-center">
        <div class="art-header-png"></div>
        <div class="art-header-jpeg"></div>
        </div>
        </div>
        <div class="art-headerobject"></div>
        <div class="art-logo">
<?php include "_judul_web.php";?>
        </div>
        </div>
        <div class="cleared reset-box"></div><div class="art-nav">
        <div class="art-nav-l"></div>
        <div class="art-nav-r"></div>
        <div class="art-nav-outer">
	        <ul class="art-hmenu">
				<li>
			    <a href="index.php?top=home.php" class="active"><span class="l"></span><span class="r"></span><span class="t">Home</span></a>
                </li>	
                <li>
			    <a href="index.php?top=pasien_add_fm.php"><span class="l"></span><span class="r"></span><span class="t">Proses Diagnosa</span></a>
                </li>	
                <li>
                <a href="index.php?top=istilahmedis.php"><span class="l"></span><span class="r"></span><span class="t">Istilah Medis</span></a>
                </li>	
                <li>
                <a href="index.php?top=informasi.php"><span class="l"></span><span class="r"></span><span class="t">Informasi</span></a>
                </li>	
                <li>
			    <a href="index.php?top=daftar-penyakit.php"><span class="l"></span><span class="r"></span><span class="t">Daftar Penyakit</span></a>
                </li>	
                <li>
               <a target="_blank" href="admin/index.php"><span class="l"></span><span class="r"></span><span class="t">Login Admin</span></a>
                </li>	
	        </ul>
</div>
</div>
        <div class="cleared reset-box"></div>
        <div class="art-content-layout">
        <div class="art-content-layout-row">
        <div class="art-layout-cell art-content">
        <div class="art-post">
        <div class="art-post-body">
        <div class="art-post-inner art-article">
        <div class="art-postcontent">

<p><?php  
$top=$_GET['top'];
if(empty($top)){
$on_top="home.php";
}
else{
$on_top="konsultasifm.php";
include "$on_top";
//include "hasil_diagnosa.php"; 
}
?></p>


        </div>
        <div class="cleared"></div>
        </div>
		<div class="cleared"></div>
        </div>
        </div>
        <div class="cleared"></div>
        </div>
        </div>
        </div>
        <div class="cleared"></div>
        <div class="art-footer">
        <div class="art-footer-t"></div>
        <div class="art-footer-body">
        <div class="art-footer-text">
                                
            <p><strong>Sistem Pakar Diagnosis Demem Berdarah Dangue (DBD) Pada Anak</strong></p>
            <p><strong>Copyright ©2020. All Rights Reserved | Programming by <a href="https://www.instagram.com/ra.raisaa/" title="Iqra Raissa F" target="_blank">Iqra Raissa F</a></strong></p>

        </div>
        <div class="cleared"></div>
        </div>
        </div>
    	<div class="cleared"></div>
        </div>
        </div>
        <div class="cleared"></div>
          <p class="art-page-footer">&nbsp;</p>
</div>
</body>
</html>
