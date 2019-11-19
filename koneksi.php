<?php 

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "impal";

$koneksi = mysqli_connect("localhost","root","","impal");


// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>
