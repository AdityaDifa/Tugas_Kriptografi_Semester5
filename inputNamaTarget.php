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
function gantiSpasi($string) {
    // Mengganti karakter tidak valid dengan garis bawah
    $string = preg_replace('/[^a-zA-Z0-9_]/', '_', $string);

    // Mengganti spasi dengan garis bawah
    $string = str_replace(' ', '_', $string);
    
    return $string;
}


// function caesarDecrypt($ciphertext, $shift) {
//     // Fungsi decrypt sama dengan encrypt, hanya dengan shift negatif
//     return caesarEncrypt($ciphertext, -$shift);
// }


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

$nama = $_POST['namaTarget'];
$nama = gantiSpasi($nama);
$key = "kriptoitusangatmenyenangkanhahah";
$iv = "kriptoituindahha";

$shift = 2;
$namaEnkrip = caesarEncrypt($nama,$shift);
$namaEnkrip = encryptAES($namaEnkrip, $key, $iv); //plaintext,kunci,iv

$sql = "INSERT INTO namatarget (nama_target) VALUES ('$namaEnkrip')";

if ($conn->query($sql) === TRUE) {
    header("location:main.php?sukses");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi database
$conn->close();
 ?>