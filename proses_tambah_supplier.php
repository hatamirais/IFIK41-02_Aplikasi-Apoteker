<?php

include("koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['tambah'])){

    // ambil data dari formulir
    if(isset($_POST['nama'])){ $nama = $_POST['nama']; }
    $nama = $_POST['Nama Obat'];
    $alamat = $_POST['Alamat Supplier'];
    $nomor = $_POST['Nomor Kontak'];

    // buat query
    if(!empty($nama) && !empty($alamat) && !empty($nomor)){
        $sql = "INSERT INTO supplier (Nama Obat, Alamat Supplier, Nomor Kontak) VALUES('".$nama."','".$alamat."','".$nomor."')";
        $simpan = mysqli_query($koneksi, $sql);
        if($simpan && isset($_GET['aksi'])){
          if($_GET['aksi'] == 'create'){
            header('location: apoteker_kelola_supplier.php');
          }
        }
      } else {
        $pesan = "Tidak dapat menyimpan, data belum lengkap!";
      }


} else {
    die("Akses dilarang...");
}

?>