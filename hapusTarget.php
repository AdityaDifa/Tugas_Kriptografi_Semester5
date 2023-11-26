<?php 

function encryptAES($plaintext, $key, $iv) {
    $cipher = "aes-256-cbc";
    $options = 0;

    $encrypted = openssl_encrypt($plaintext, $cipher, $key, $options, $iv);

    return $encrypted;
}
// function decryptAES($encryptedData, $key, $iv) {
//     $cipher = "aes-256-cbc";
//     $options = 0;

//     $decryptedData = openssl_decrypt($encryptedData, $cipher, $key, $options, $iv);

//     return $decryptedData;
// }

function caesarEncrypt($plaintext, $shift) {
    $result = '';

    // Loop melalui setiap karakter dalam plaintext
    for ($i = 0; $i < strlen($plaintext); $i++) {
        $char = $plaintext[$i];

        // Periksa apakah karakter adalah huruf alfabet
        if (ctype_alpha($char)) {
            // Tentukan apakah karakter adalah huruf besar atau kecil
            $isUpperCase = ctype_upper($char);

            // Ubah huruf sesuai dengan pergeseran
            $char = ($isUpperCase) ? chr((ord($char) + $shift - 65) % 26 + 65) : chr((ord($char) + $shift - 97) % 26 + 97);
        }

        // Tambahkan karakter ke hasil
        $result .= $char;
    }

    return $result;
}

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$database = "kripto";

$conn = new mysqli($host, $dbusername, $dbpassword, $database);
$nama = $_GET['nama'];

$key = "kriptoitusangatmenyenangkanhahah";
$iv = "kriptoituindahha";
$shift = 2;

$nama = caesarEncrypt($nama,$shift);
$nama = encryptAES($nama, $key, $iv); //plaintext,kunci,iv

$sql = "DELETE FROM namatarget WHERE nama_target='$nama'";
//$query = mysqli_query($conn,"DELETE FROM namatarget WHERE nama_target=$nama");

if ($conn->query($sql) === TRUE) {
    header("location:listTarget.php?targetBerhasilDieliminasi");
    //echo $nama;
} else {
    header("location:listTarget.php?errorMenghapusData");
}

// if(query)
// {
// 	header("location:main.php?targetBerhasilDieliminasi");
// }
// else{
// 	header("location:main.php?errorDelete");
// }

 ?>