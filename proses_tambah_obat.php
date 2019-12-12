<?php

include("koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['tambah'])){

    // ambil data dari formulir
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $tgl_masuk = $_POST['tanggal masuk'];
    $tgl_kadaluarsa = $_POST['tanggal kadaluarsa'];

    // buat query
    if(!empty($nama) && !empty($jenis) && !empty($tgl_masuk) && !empty($tgl_kadaluarsa)){
        $sql = "INSERT INTO obat (nama, jenis, tanggal masuk, tanggal kadaluarsa) VALUES('".$nama."','".$jenis."','".$tgl_masuk."','".$tgl_kadaluarsa."')";
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