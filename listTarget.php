<?php 
session_start();
if(empty($_SESSION['username']))
{
	header("location:index.php?pesan=login_dulu_dek");
}

function gantiUnderscore($teks) {
  return str_replace('_', ' ', $teks);
}

function gantiSpasi($string) {
  // Mengganti spasi dengan garis bawah dan hanya mempertahankan karakter yang valid
  $string = preg_replace('/[^a-zA-Z0-9_]/', '_', str_replace(' ', '_', $string));
  
  return $string;
}


function decryptAES($encryptedData, $key, $iv) {
    $cipher = "aes-256-cbc";
    $options = 0;

    $decryptedData = openssl_decrypt($encryptedData, $cipher, $key, $options, $iv);

    return $decryptedData;
}

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

function caesarDecrypt($ciphertext, $shift) {
    // Fungsi decrypt sama dengan encrypt, hanya dengan shift negatif
    return caesarEncrypt($ciphertext, 26-$shift);
}

$key = "kriptoituindah1";
$iv = "kriptoituindah11";
$shift = 2;

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$database = "kripto";

$conn = new mysqli($host, $dbusername, $dbpassword, $database);
$query = mysqli_query($conn,"SELECT * FROM namatarget");
?>


<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="binLogo.png" type="image/x-icon">
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>List Target</title>
	<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="login_style.css" />
    <style type="text/css">
      .button-30{
        height: 30px;
        padding-left: 8px;
        padding-right: 8px;
      }
      .button-30:hover{
        background-color: red;
        box-shadow: rgba(107, 0, 0, 0.8) 0 4px 8px, rgba(107, 0, 0, 0.8) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
        color: white;
      }
    </style>
</head>
<body>
	<div style="height: 100vh">
      <div class="container-{breakpoint} text-center">
        <div class="row">
          <div class="col">
            <h2 class="text-menarik">
              <marquee>Kriptografi itu menyenangkan :D</marquee>
            </h2>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <!-- kosong -->
          </div>

          <div class="col-2 box border border-dark">
            <div class="container py-2">
              <!-- header -->
           		<h2>List Target</h2>
            </div>
            <div class="row">
              <div class="col text-md-start mb-2">
                <a href="main.php" ><button class="button-30">Kembali</button></a>
                <a href="hapusSemua.php" ><button class="button-30 ml-2">hapus semua</button></a>
              </div>
            </div>
            <div class="row">
              <center>
                <div class="col">
                <table border=5 class="table table-success table-striped">
                <tr>
                  <td>Nama Target</td>
                  <td>Hapus Target</td>
                </tr>

                <?php
                

                // Membuat koneksi ke database
                
                while($data=mysqli_fetch_array($query))
                  {
                  ?>
                  <tr>
                    <td>
                      <?php echo gantiUnderscore(caesarDecrypt(decryptAES($data['nama_target'],$key,$iv),$shift)) ?>
                      <!-- <-- caesarDecrypt(decryptAES($data['nama_target'],$key,$iv),$shift)-> -->
                    </td>
                    <td>
                      <a href="hapusTarget.php?nama=<?php echo gantiSpasi(caesarDecrypt(decryptAES($data['nama_target'],$key,$iv),$shift)) ?>"><button class="button-30" onclick="targetMati()">Target Mati</button></a>
                    </td>
                  </tr>
                  <?php } ?>
                </table>
                </div>
                </center>
            	
            </div>
          </div>

          <div class="col">
            <!-- kosong -->
          </div>
        </div>
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script src="login_checkbutton.js"></script>
</body>
</html>