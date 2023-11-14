<!-- Pada file ini kalian membuat coding untuk logika delete / menghapus data mobil pada showroom sesuai id-->
<?php 
// (1) Jangan lupa sertakan koneksi database dari yang sudah kalian buat yaa
$connect = mysqli_connect("localhost", "root", "", "modul3_wad");
// (2) Tangkap nilai "id" mobil (CLUE: gunakan GET)
$id = $_GET['id'];
    // (3) Buatkan perintah SQL DELETE untuk menghapus data dari tabel berdasarkan id mobil
    $sql = "DELETE FROM showroom_mobil WHERE id = $id";
    return mysqli_affected_rows($koneksi);

    // (4) Buatkan perkondisi jika eksekusi query berhasil
    if ( hapus($id) > 0 ){
        echo
        "<script>
        alert('Data berhasil dihapus');
        document.location.href = 'read.php';
        </script>";
      }
      else{
        echo
        "<script>
        alert('Data gagal dihapus');
        document.location.href = 'read.php';
        </script>";
      }
// Tutup koneksi ke database setelah selesai menggunakan database
$connect->close();
?>