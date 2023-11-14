<!-- Pada file ini kalian membuat coding untuk logika update / meng-edit data mobil pada showroom sesuai id-->
<?php
// (1) Jangan lupa sertakan koneksi database dari yang sudah kalian buat yaa
$connect = mysqli_connect("localhost", "root", "", "modul3_wad");
// (2) Tangkap nilai "id" mobil (CLUE: gunakan GET)
$id = $_GET['id'];
    // (3) Buatkan fungsi "update" yang menerima data sebagai parameter
    function query($data){
        global $connect;
      
        $hasil = mysqli_query($connect, $data);
        $rows = [];
        while ($row = mysqli_fetch_assoc($hasil)){
          $rows[] = $row;
        }
      
        return $rows;
      }
        // Dapatkan data yang dikirim sebagai parameter dan simpan dalam variabel yang sesuai.
        
        // Buatkan perintah SQL UPDATE untuk mengubah data di tabel, berdasarkan id mobil

        // Eksekusi perintah SQL

        // Buatkan kondisi jika eksekusi query berhasil
        // Jika terdapat kesalahan, buatkan eksekusi query gagalnya
        if ( edit($id) > 0 ){
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
    // Panggil fungsi update dengan data yang sesuai

// Tutup koneksi ke database setelah selesai menggunakan database
$connect->close();
?>