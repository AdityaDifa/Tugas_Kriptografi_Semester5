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
  <link rel="icon" href="binLogo.png" type="image/x-icon">
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Main</title>
	<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="login_style.css" />
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
           		<h2>pilih salah satu</h2>
            </div>

            <div class="row">
            	<div class="col">
            		<a href="masukanNamaTarget.php"><button class="button-30">Masukan Nama Target</button></a>
            	</div>
              <div class="col">
                <a href="listTarget.php"><button class="button-30">List Target</button></a>
              </div>
            	<div class="col">
            		<a href="halamanSteganografi.php"><button class="button-30">Fitur Steganografi</button></a>
            	</div>
            </div>

            <div class="row">
              <div class="col text-md-bottom" style="margin-top: 250px">
                <a href="logout.php" ><button class="button-30">Keluar/logout</button></a>
              </div>
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