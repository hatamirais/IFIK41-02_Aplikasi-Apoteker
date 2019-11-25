<?php

include("koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['tambah'])){

    // ambil data dari formulir
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $tanggal_masuk = $_POST['tanggal masuk'];
    $tanggal_kadaluarsa = $_POST['tanggal kadaluarsa'];

    // buat query
    if(!empty($nama) && !empty($jenis) && !empty($tanggal_masuk) && !empty($tanggal_kadaluarsa)){
        $sql = "INSERT INTO obat (nama, jenis, tanggal masuk, tanggal kadaluarsa) VALUES('".$nama."','".$jenis."','".$tanggal_masuk."','".$tanggal_kadaluarsa."')";
        $simpan = mysqli_query($koneksi, $sql);
        if($simpan && isset($_GET['aksi'])){
          if($_GET['aksi'] == 'create'){
            header('location: apoteker_kelola_obat.php');
          }
        }
      } else {
        $pesan = "Tidak dapat menyimpan, data belum lengkap!";
      }


} else {
    die("Akses dilarang...");
}

?>