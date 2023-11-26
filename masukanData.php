<?php

function encryptAES($plaintext, $key, $iv) {
    $cipher = "aes-256-cbc";
    $options = 0;

    $encrypted = openssl_encrypt($plaintext, $cipher, $key, $options, $iv);

    return $encrypted;
}


$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$database = "kripto";

// Membuat koneksi ke database
$conn = new mysqli($host, $dbusername, $dbpassword, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}

// Mengambil data dari formulir
$username = $_POST['username_input'];
$password = $_POST['password_input']; 

$key = "kriptoitusangatmenyenangkanhahah";
$iv = "kriptoituindahha";
$passwordEnkrip = encryptAES($password, $key, $iv); //plaintext,kunci,iv
// Menyimpan data ke database
$sql = "INSERT INTO akun (username, password) VALUES ('$username', '$passwordEnkrip')";

if ($conn->query($sql) === TRUE) {
    header("location:index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi database
$conn->close();
?>

