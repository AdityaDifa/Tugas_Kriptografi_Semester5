<?php 

function encryptAES($ciphertext, $key, $iv) {
    $cipher = "aes-256-cbc";
    $options = 0;

    $ecrypted = openssl_encrypt($ciphertext, $cipher, $key, $options, $iv);

    return $ecrypted;
}

session_start();
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$database = "kripto";

// Membuat koneksi ke database
try {
    $conn = new mysqli($host, $dbusername, $dbpassword, $database);

    // Periksa apakah terjadi kesalahan koneksi
    if ($conn->connect_error) {
        throw new Exception("Kesalahan koneksi: " . $conn->connect_error);
    }

    // Kode lainnya jika koneksi berhasil
} catch (Exception $e) {
    header("location:index.php?DatabaseBelumDiBuat&error=" . urlencode($e->getMessage()));
}

$username = $_POST['username_input'];
$password = $_POST['password_input']; 


$key = "kriptoituindah1";
$iv = "kriptoituindah1";
$passwordDenkrip = encryptAES($password, $key, $iv); //plaintext,kunci,iv

$data = mysqli_query($conn,"select * from akun where username ='$username' and password = '$passwordDenkrip'")or die(mysqli_error($conn));

$cek = mysqli_num_rows($data);

if($cek > 0)
{
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:main.php");
}
else{
	header("location:index.php?pesan=gagal");
}
?>