<?php

 
include('../../include/koneksi.php');


if (isset($_POST['insert'])) {
  $nama_users = $_POST['nama_users'];
  $nip = $_POST['nip'];
  $golongan = $_POST['golongan'];
  $alamat_users = $_POST['alamat_users'];
  $email_users = $_POST['email_users'];
  $no_telp_users = $_POST['no_telp_users'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $status = 'aktiv';
  $hak_akses = 'guru';
  $query = "INSERT INTO `tbl_users`(`nama_users`,`nip`,`golongan`, `alamat_users`, `email_users`, `no_telp_users`, `hak_akses`, `username`, `password`, `status`) VALUES ('$nama_users','$nip','$golongan','$alamat_users','$email_users','$no_telp_users','$hak_akses','$username','$password','$status')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Insert Data Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: '.$base_url.'admin/data_guru.php');


}

?>
