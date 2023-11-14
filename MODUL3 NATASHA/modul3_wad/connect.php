<!-- File ini berisi koneksi dengan database yang telah di import ke phpMyAdmin kalian -->


<?php
// Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin
$connect = mysqli_connect("localhost", "root", "", "modul3_wad");

$query = "INSERT INTO modul3_wad VALUES('$id','$nama_barang','$brandmobil','$warnamobil','$tipemobil','$harga_mobil','')";

mysqli_query($connect, $query);
// 
  
// Buatlah perkondisian jika tidak bisa terkoneksi ke database maka akan mengeluarkan errornya

if (mysqli_connect_errno()) {
    echo "Koneksi Gagal " . mysqli_connect_error();
}

// 
?>