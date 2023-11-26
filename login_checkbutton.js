function gantiTypeInput() {
    var checklist = document.getElementById("cek_password");
    var password_input = document.getElementById("password_input");

    if (password_input.type === 'text') {
        password_input.type = 'password';
      } else {
        password_input.type = 'text';
      }
}

function cek_login()
{
    //var username_input = document.getElementById('username_input');
    var password_input = document.getElementById('password_input');

    var username = username_input.value;
    var password = password_input.value;

    var enkripsiUsername;
    var enkripsiPassword;

    var key = CryptoJS.enc.Utf8.parse('my-secret-key');
    var iv = CryptoJS.lib.WordArray.random(128 / 8); // Inisialisasi vektor inisialisasi

    // Enkripsi username dan password
    //enkripsiUsername = CryptoJS.AES.encrypt(username, key, { iv: iv }).toString();
    enkripsiPassword = CryptoJS.AES.encrypt(password, key, { iv: iv }).toString();

    console.log('Encrypted Username:', enkripsiUsername);
    console.log('Encrypted Password:', enkripsiPassword);
}
function targetMati()
{
    alert("innalillahiwainnailaihirojiun");
}