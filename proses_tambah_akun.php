<?php

include("koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['tambah'])){

    // ambil data dari formulir
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    // buat query
    if(!empty($nama) && !empty($username) && !empty($password) && !empty($level)){
        $sql = "INSERT INTO user (nama, username, password, level) VALUES('".$nama."','".$username."','".$password."','".$level."')";
        $simpan = mysqli_query($koneksi, $sql);
        if($simpan && isset($_GET['aksi'])){
          if($_GET['aksi'] == 'create'){
            header('location: admin_kelola_akun.php');
          }
        }
      } else {
        $pesan = "Tidak dapat menyimpan, data belum lengkap!";
      }

    } else {
    die("Akses dilarang...");
    }

    if(isset($_POST['btn_ubah'])){
      $id = $_POST['id'];
      $nama = $_POST['nama'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $level = $_POST['level'];
      
      if(!empty($nama) && !empty($username) && !empty($password) && !empty($level)){
        $perubahan = "nama='".$nama."',username=".$username.",username=".$password.",password='".$level.",level='";
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

      if(isset($_GET['id']) && isset($_GET['aksi'])){
        $id = $_GET['id'];
        $sql_hapus = "DELETE FROM user WHERE id=" . $id;
        $hapus = mysqli_query($koneksi, $sql_hapus);
        
        if($hapus){
          if($_GET['aksi'] == 'delete'){
            header('location: admin_kelola_akun.php');
          }
        }
      }
      

    ?>