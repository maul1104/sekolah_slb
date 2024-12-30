<?php

if(!isset($_SESSION))
{
    session_start();
}

$base_url = "http://localhost/sekolah_slb/";

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'sekolah_slb'
) or die(mysqli_error($mysqli));



?>
