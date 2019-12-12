<?php

include("koneksi.php");

//add
if(isset($_POST['tambah'])){

    if(isset($_POST['nama'])){ $nama = $_POST['nama']; }
    if(isset($_POST['alamat'])){ $kontak = $_POST['kontak']; }
    if(isset($_POST['kontak'])){ $alamat = $_POST['alamat']; }

    if(!empty($nama) && !empty($kontak) && !empty($alamat)){
        $sql = "INSERT INTO supplier (nama, kontak, alamat) VALUES('".$nama."','".$kontak."','".$alamat."')";
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

//edit
if(isset($_POST['btn_ubah'])){
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $kontak = $_POST['kontak'];
  $alamat = $_POST['alamat'];
  
  if(!empty($nama) && !empty($kontak) && !empty($alamat)){
    $perubahan = "nama='".$nama."',kontak=".$kontak.",alamat=".$alamat."";
    $sql_update = "UPDATE user SET ".$perubahan." WHERE id=$id";
    $update = mysqli_query($koneksi, $sql_update);
    if($update && isset($_GET['aksi'])){
      if($_GET['aksi'] == 'update'){
        header('location: admin_kelola_akun.php');
      }
    }
  } else {
    $pesan = "Data tidak lengkap!";
  }
}

//delete
function hapus($koneksi){

  if(isset($_GET['id']) && isset($_GET['aksi'])){
    $id = $_GET['id'];
    $sql_hapus = "DELETE FROM supplier WHERE id=" . $id;
    $hapus = mysqli_query($koneksi, $sql_hapus);
    
    if($hapus){
      if($_GET['aksi'] == 'delete'){
        header('location: admin_kelola_akun.php');
      }
    }
  }
  
}

?>