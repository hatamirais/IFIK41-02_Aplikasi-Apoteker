<?php

include("koneksi.php");

//add
if(isset($_POST['tambah'])){

    
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $tgl_masuk = $_POST['tanggal masuk'];
    $tgl_kadaluarsa = $_POST['tanggal kadaluarsa'];
    $jumlah = $_POST('jumlah');
    $harga = $_POST('harga');

    // buat query
    if(!empty($nama) && !empty($jenis) && !empty($tgl_masuk) && !empty($tgl_kadaluarsa) && !empty($jumlah)){
        $sql = "INSERT INTO obat (nama, jenis, tanggal masuk, tanggal kadaluarsa, jumlah, harga) VALUES('".$nama."','".$jenis."','".$tgl_masuk."','".$tgl_kadaluarsa."','".$jumlah."')";
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

//edit
if(isset($_POST['btn_ubah'])){
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $jenis = $_POST['jenis'];
  $tanggal_masuk = $_POST['tanggal masuk'];
  $tanggal_kadaluarsa = $_POST['tanggal kadaluarsa'];
  $jumlah = $_POST['jumlah'];
  $harga = $_POST['harga'];
  
  if(!empty($nama) && !empty($jenis) && !empty($tanggal_masuk) && !empty($tanggal_kadaluarsa) && !empty($jumlah) && !empty($harga)){
    $perubahan = "nama='".$nama."',jenis=".$jenis.",tanggal masuk=".$tanggal_masuk.",tanggal kadaluarsa='".$tanggal_kadaluara.",jumlah='$jumlah";
    $sql_update = "UPDATE obat SET ".$perubahan." WHERE id=$id";
    $update = mysqli_query($koneksi, $sql_update);
    if($update && isset($_GET['aksi'])){
      if($_GET['aksi'] == 'update'){
        header('location: admin_kelola_obat.php');
      }
    }
  } else {
    $pesan = "Data tidak lengkap!";
  }
}

if(isset($_GET['id']) && isset($_GET['aksi'])){
  $id = $_GET['id'];
  $sql_hapus = "DELETE FROM obat WHERE id=" . $id;
  $hapus = mysqli_query($koneksi, $sql_hapus);
  
  if($hapus){
    if($_GET['aksi'] == 'delete'){
      header('location: admin_kelola_obat.php');
    }
  }
}
?>