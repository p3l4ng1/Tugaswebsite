<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database 
include 'Koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

    $data = mysqli_fetch_assoc($login);

    // cek jika user login sebagai admin
    if($data['level']=="admin"){

    // buat session login dan username
    $_SESSION['username'] = $username;
    $_SESSION['level'] = "admin";
    // alihkan ke halaman dashboard admin
   header("location:admin/index.php");

// cek jika user login sebagai siswa
  }else if($data['level']=="operator"){
   // buat session login dan username
   $_SESSION['username'] = $username;
   $_SESSION['level'] = "operator";
   // alihkan ke halaman dashboard siswa
  header("location:operator.php");

// cek jika user login sebagai siswa
  }else if($data['level']=="kepsek"){
   // buat session login dan username
   $_SESSION['username'] = $username;
   $_SESSION['level'] = "kepsek";
   // alihkan ke halaman dashboard siswa
  header("location:kepsek.php");

// cek jika user login sebagai siswa
  }else if($data['level']=="walimurid"){
   // buat session login dan username
   $_SESSION['username'] = $username;
   $_SESSION['level'] = "walimurid";
   // alihkan ke halaman dashboard siswa
  header("location:walimurid.php");

// cek jika user login sebagai siswa
  }else if($data['level']=="guru"){
   // buat session login dan username
   $_SESSION['username'] = $username;
   $_SESSION['level'] = "guru";
   // alihkan ke halaman dashboard siswa
  header("location:guru.php");

// cek jika user login sebagai siswa
  }else if($data['level']=="siswa"){
   // buat session login dan username
   $_SESSION['username'] = $username;
   $_SESSION['level'] = "siswa";
   // alihkan ke halaman dashboard siswa
  header("location:siswa.php");


}else{

  // alihkan ke halaman login kembali
  header("location:index.php?pesan=gagal");
}


}else{
   header("location:index.php?pesan=gagal");
}



 ?>
