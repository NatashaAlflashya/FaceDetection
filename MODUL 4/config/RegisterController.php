<?php

require 'connect.php';

// (1) Mulai session
session_start();

    // (2) Ambil nilai input dari form registrasi
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // (3) Buat dan lakukan query untuk mencari data dengan email yang sama dari nilai input email
    $query_check_email = "SELECT * FROM users WHERE email = '$email'";
    $result_check_email = mysqli_query($db, $query_check_email);

    // (4) Buatlah perkondisian ketika tidak ada data email yang sama
    if (mysqli_num_rows($result_check_email) == 0) {
        // a. Buatlah query untuk melakukan insert data ke dalam database
        $query_insert_user = "INSERT INTO users (name, username, email, password) VALUES ('$name', '$username', '$email', '$password')";
        $insert_result = mysqli_query($db, $query_insert_user);

        // b. Buat lagi perkondisian atau percabangan ketika query insert berhasil dilakukan
        if ($insert_result) {
            $_SESSION['message'] = "Pendaftaran berhasil!";
            $_SESSION['color'] = 'success';
            header("Location: ../views/login.php");
    
        } else {
            $_SESSION['message'] = "Gagal melakukan pendaftaran. Silakan coba lagi.";
            header("Location: ../views/register.php");
        }

    } else {
        // (5) Buat juga kondisi else
        $_SESSION['message'] = "Email sudah terdaftar.";
        header("Location: ../views/register.php");
    }
?>
