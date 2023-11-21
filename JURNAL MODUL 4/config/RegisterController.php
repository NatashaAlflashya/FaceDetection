<?php

require 'connect.php';

// (1) Mulai session
session_start();
//

// (2) Ambil nilai input dari form registrasi

    // a. Ambil nilai input email
    $email = $_POST['email'];
    // b. Ambil nilai input name
    $name = $_POST['name'];
    // c. Ambil nilai input username
    $username = $_POST['username'];
    // d. Ambil nilai input password
    $password = $_POST['password'];
    // e. Ubah nilai input password menjadi hash menggunakan fungsi password_hash()
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
//

// (3) Buat dan lakukan query untuk mencari data dengan email yang sama dari nilai input email
$sql = "SELECT * FROM users WHERE email='$email'";
if ($result = mysqli_query($db, $sql)) 

// (4) Buatlah perkondisian ketika tidak ada data email yang sama ( gunakan mysqli_num_rows == 0 )
    if (mysqli_num_rows($result) == 0) {
    
    // a. Buatlah query untuk melakukan insert data ke dalam database
    $sql = "INSERT INTO users(email, name, username, password) VALUES('$email', '$name', '$username', '$hash
    ed_password')";
    // b. Buat lagi perkondisian atau percabangan ketika query insert berhasil dilakukan
    //    Buat di dalamnya variabel session dengan key message untuk menampilkan pesan penadftaran berhasil
    if (mysqli_query($db, $sql)) {
        // i. Buat di dalamnya variabel session dengan key message untuk menampilkan pesan penadftaran berhasil
        $_SESSION['message'] = "Registration successful!";
        header("location: ../views/login.php");
    } else {
        // ii. Buat di dalamnya variabel session dengan key message untuk menampilkan pesan error karena data email sudah terdaftar
        $_SESSION['message'] = "Error: " . $sql . "<br>" . mysqli_error($db);
        
    }
} else {

// 

// (5) Buat juga kondisi else
//     Buat di dalamnya variabel session dengan key message untuk menampilkan pesan error karena data email sudah terdaftar
    $_SESSION['message'] = "Error: Email already exists!";
}
//
mysqli_close($db);
?>