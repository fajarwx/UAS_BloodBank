<?php

include 'koneksi.php';

if (isset($_POST['kirim2'])){
    $jenisdarah=$_POST['jenis_darah'];
    $kurang=$_POST['pengurangan'];
}
$ambildata=mysqli_query($conn, "SELECT * FROM stock_darah where jenis_darah='$jenisdarah'");
$a=mysqli_fetch_array($ambildata);
$stock=$a['stock'];

$pengurangan=$stock-$kurang;

    $simpan="UPDATE stock_darah SET stock='$pengurangan' where jenis_darah='$jenisdarah'";
   
    $result=mysqli_query($conn, $simpan);

    if($result){
        echo"<script>alert('data berhasil dikurangi');window.location='home_admin.php'</script>";
    } else{
        echo"<script>alert('data gagal dikurangi');</script>";
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