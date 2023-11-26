<?php 
session_start();
if(empty($_SESSION['username']))
{
	header("location:index.php?pesan=login_dulu_dek");
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Steganografi</title>
  <link
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
  rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
  crossorigin="anonymous"
  />
  <link rel="stylesheet" type="text/css" href="login_style.css" />
  <style>
    .box{
      height:800px;
    }
  </style>
  <link rel="icon" href="binLogo.png" type="image/x-icon">
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
            <h2>Steganografi</h2>
            <div class="row">
              <div class="col text-md-start mb-2">
                <a href="main.php" ><button class="button-30">Kembali</button></a>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <input type="file" id="imageInput" accept="image/*">
                <br>
                <textarea id="messageInput" placeholder="Enter message"></textarea>
                <br>
                <button onclick="encode()" class="button-30">Encode Message</button>
                <button onclick="tampilkanGambar()" class="button-30">Decode Message</button>
                <br>
                <img id="resultImage" alt="Result Image" style="max-height: 500px;max-width: 500px">
                <br>
                <img id="dekripImg" alt="dekrip img" style="max-height: 500px;max-width: 500px">
              </div>
            </div>
            <div class="row">
              <div class="col">
                <!-- <button class="button-30" onclick="unduhGambar()">unduh gambar</button> -->
                <a id="downloadLink" style="display:none;color:black;">Download Result</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <!-- kosong -->
        </div>
      </div>
    </div>
  </div>


  <script>
    function tampilkanGambar() {
        var inputFile = document.getElementById('imageInput');
        var previewImage = document.getElementById('dekripImg');

        if (inputFile.files && inputFile.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
            };

            reader.readAsDataURL(inputFile.files[0]);
            decode();
        }
    }
</script>

  <script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
  crossorigin="anonymous"
  ></script>
  <script src="steganografi2.js"></script>
</body>
</html>