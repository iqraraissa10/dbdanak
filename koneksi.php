<?php
// $host = 'localhost';
// $user = 'root';
// $pass = '';
// $dbName = 'tbcanak';
// $koneksi = mysqli_connect($host, $user, $pass);
// ($db = mysqli_select_db($dbName, $koneksi)) or
//     die(
//         "<center color='red'><strong>" .
//             mysqli_error() .
//             '</strong></center>' .
//             "<center><font color='red'><strong>Koneksi Gagal...! karena database tidak ada</strong></font></center><center><p align='center'>Informasi  </p>
// "
//     );
// if (!$koneksi) {
//     echo "<center><font color='red'><strong>Koneksi Gagal...!</strong></font></center>";
//     echo "<center><font color='red'><strong>DATABASE $dbName tidak ditemukan...!</strong></font></center>";
// }

$koneksi = mysqli_connect('localhost', 'root', '', 'dbdanak');
if (!$koneksi) {
    echo "<center><font color='red'><strong>Koneksi Gagal...!</strong></font></center>";
}
?>
