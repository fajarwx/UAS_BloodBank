<?php
session_start();

include 'koneksi.php';

if (isset($_POST['kirim2'])){
    
    $tambahan=$_POST['tambahan'];
   
} 
$ambildata=mysqli_query($conn, "SELECT * FROM user where tgl_donor='$tgl_donor'");
$a=mysqli_fetch_array($ambildata);
$tgl_donor=$a['tgl_donor'];
$username = $a['username'];
$penambahan=$tgl_donor+$tambahan;

    $simpan="UPDATE user SET tgl_donor='$penambahan' where username='$username'";
   
    $result=mysqli_query($conn, $simpan);

    if($result){
        echo"<script>alert('data berhasil dipesan');window.location='home_user.php'</script>";
    } else{
        echo"<script>alert('data gagal diupdate');</script>";
    }
    echo "<pre>";
var_dump($simpan);
echo "</pre>";
echo "<pre>";
var_dump($conn);
echo "</pre>";
echo "<pre>";
var_dump($result);
echo "</pre>";
    ?>