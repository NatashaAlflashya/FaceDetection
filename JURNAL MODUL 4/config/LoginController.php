<?php

require 'connect.php';

// function untuk melakukan login
function login($input) {

    // (1) Panggil variabel global $db dari file config
    $db = new mysqli('localhost', 'root', '', 'jurnal_modul4');

    if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
    }

    function login($input) {
    global $db;
    // 

    // (2) Ambil nilai input dari form login
        // a. Ambil nilai input email
        $email = $input['email'];
        // b. Ambil nilai input password
        $password = $input['password'];
    // 

    // (3) Buat dan lakukan query untuk mencari data dengan email yang sama
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // 

    // (4) Buatlah perkondisian ketika email ditemukan ( gunakan mysqli_num_rows == 1 )
    if ($result->num_rows == 1) {
        // a. Simpan hasil query menjadi array asosiatif menggunakan fungsi mysqli_fetch_assoc
        $user = $result->fetch_assoc();
        // 

        // b. Lakukan verifikasi password menggunakan fungsi password_verify
        if (password_verify($password, $user['password'])) {

        
            // c. Set variabel session dengan key login untuk menyimpan status login
            session_start();
            $_SESSION['login'] = true;
            // d. Set variabel session dengan key id untuk menyimpan id user
            $_SESSION['id'] = $user['id'];
            //

            // e. Buat kondisi untuk mengecek apakah checkbox "remember me" terisi kemudian set cookie dan isi dengan id
            if (isset($input['remember_me'])) {
                setcookie('remember_me', $user['id'], time() + (86400 * 30), '/'); // 86400 = 1 day
            }
            // 
        // f. Buat kondisi else dan isi dengan variabel session dengan key message untuk meanmpilkan pesan error ketika password tidak sesuai
        } else {
            session_start();
            $_SESSION['message'] = "Error: Password is not correct";
        }
        // 
    // 

    // (5) Buat kondisi else, kemudian di dalamnya
    //     Buat variabel session dengan key message untuk menampilkan pesan error ketika email tidak ditemukan
    } else {
        session_start();
        $_SESSION['message'] = "Error: Email not found";
    }

$stmt->close();
}
    // 
}
// 

// function untuk fitur "Remember Me"
function rememberMe($cookie)
{
    // (6) Panggil variabel global $db dari file config
    global $db;

    // 

    // (7) Ambil nilai cookie yang ada
    $id = $cookie['remember_me'];
    // 

    // (8) Buat dan lakukan query untuk mencari data dengan id yang sama
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    // 

    // (9) Buatlah perkondisian ketika id ditemukan ( gunakan mysqli_num_rows == 1 )
    if ($result->num_rows == 1) {
        // a. Simpan hasil query menjadi array asosiatif menggunakan fungsi mysqli_fetch_assoc
        $user = $result->fetch_assoc();
        // b. Set variabel session dengan key login untuk menyimpan status login
        session_start();
        $_SESSION['login'] = true;
        // c. Set variabel session dengan key id untuk menyimpan id user
        $_SESSION['id'] = $user['id'];
    }
    $stmt->close();
    // 
}
// 

?>