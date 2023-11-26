<!-- login page -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="login_style.css" />
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script> -->
    <style>
      body {
        background: linear-gradient(to bottom, #c2c2c2, #e0e0e0);
      }
    </style>
    <link rel="icon" href="binLogo.png" type="image/x-icon">
  </head>
  <body>
    <!-- box kotak tengah -->
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
              <div class="row">
                <div class="col" style="padding-bottom: 30px">
                  <h2>Login Page</h2>
                </div>
              </div>
              <form action="cekLogin.php" method="post">
                  <div class="row">
                  <div class="col-4 text-md-end">
                    <p class="mb-1">Masukan Username :</p>
                    <p class="mb-1">Masukan Password :</p>
                  </div>
                  <div class="col-8 text-md-start">
                    <input
                      type="text"
                      class="box-input mb-1"
                      id="username_input"
                      name = "username_input"
                    />
                    <input
                      type="password"
                      class="box-input mb-1"
                      id="password_input"
                      name = "password_input"
                    />

                    <div class="row">
                      <div class="col-1 text-md-end">
                        <input type="checkbox" onclick="gantiTypeInput()" />
                      </div>
                      <div class="col-10 text md-start">
                        <p>Lihat Password</p>
                      </div>
                    </div>
                    <button
                      class="button-30"
                      id="cek_password"
                      onclick="cek_login()"
                    >
                      Login
                    </button>
                    <p class="link_tombol"><a href="register.html">belum punya akun?</a></p>
                  </div>
                </div>
              </form>
              
            </div>
          </div>

          <div class="col">
            <!-- kosong -->
          </div>
        </div>
      </div>
    </div>

    <script src="crypto-JS.js"></script>
    <script src="encryption.js"></script>
    <script src="login_checkbutton.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
