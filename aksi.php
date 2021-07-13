<?php

include 'koneksi.php';

if (isset($_POST['kirim'])){
    $jenisdarah=$_POST['jenis_darah'];
    $tambahan=$_POST['tambahan'];
}
$ambildata=mysqli_query($conn, "SELECT * FROM stock_darah where jenis_darah='$jenisdarah'");
$a=mysqli_fetch_array($ambildata);
$stock=$a['stock'];

$penambahan=$stock+$tambahan;

    $simpan="UPDATE stock_darah SET stock='$penambahan' where jenis_darah='$jenisdarah'";
   
    $result=mysqli_query($conn, $simpan);

    if($result){
        echo"<script>alert('data telah diupdate');window.location='home_admin.php'</script>";
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