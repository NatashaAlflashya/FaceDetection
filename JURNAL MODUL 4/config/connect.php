<!-- File ini berisi koneksi dengan database MySQL -->
<?php 

// (1) Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "jurnal_modul4";

// 
$db =mysqli_connect($servername, $username, $password, $dbname);
if(!$db){
    die("Koneksi gagal: ". mysqli_connect_error());
}
// (2) Buatlah perkondisian untuk menampilkan pesan error ketika database gagal terkoneksi

 
?>