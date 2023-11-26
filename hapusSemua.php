<?php 
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$database = "kripto";

$conn = new mysqli($host, $dbusername, $dbpassword, $database);
$nama = $_GET['nama'];
$sql = "DELETE FROM namatarget";
//$query = mysqli_query($conn,"DELETE FROM namatarget WHERE nama_target=$nama");

if ($conn->query($sql) === TRUE) {
    header("location:listTarget.php?targetBerhasilDieliminasi");
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