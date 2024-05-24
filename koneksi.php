
<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'crud_mhs';

$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die(mysqli_connect_error());
}
?>