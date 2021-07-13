<?php
session_start();

include 'koneksi.php';

if (isset($_POST['kirim'])){
    
    $tambahan=$_POST['tambahan'];
   
} 
$ambildata=mysqli_query($conn, "SELECT * FROM user where request='$request'");
$a=mysqli_fetch_array($ambildata);
$request=$a['request'];
$username = $a['username'];
$penambahan=$request+$tambahan;

    $simpan="UPDATE user SET request='$penambahan' where username='$username'";
   
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