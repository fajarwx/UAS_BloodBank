<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['level'])){
    echo "<script>alert('Maaf, untuk mengakses halaman ini anda harus login terlebih dahulu!');document.location='index.php'</script>";
}
include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style type="text/css">
     
    table {
      border-spacing: 0;
      width: 70%;
      margin: 10px auto 10px auto;
    }
    table thead th {
        background-color: #bfe1ff;
        border: solid 1px #ffffff;
        color: #000000;
        padding: 10px;
        text-align: left;
        text-decoration: none;
    }
    table tbody td {
        border: solid 1px #ffffff;
        color: #333;
        padding: 10px;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="jumbotron text-white" style="background-color: rgb(177, 0, 0);">
            <h1 class="display-4">Halo, <?= $_SESSION['nama_user'] ?></h1>
            <p class="lead"> Selamat datang, anda berhasil login sebagai <b><?= $_SESSION['username']?></b></p>
            <hr class="my-4">
            <a class="btn btn-danger btn-lg" href="logout.php" role="button">Log out</a>
           
</div>
</div>


<form>
<h1 align="center"> Stok Darah</h1>
    <table border="1" width="600px" align="center">
       <thead>
       <tr>
           <th>jenis darah</th>
           <th>stock</th>
           
           
       </tr>
       </thead>
       <tbody>
<?php

$ambildata=mysqli_query($conn, "SELECT * FROM stock_darah order by id_stock asc");
while($a=mysqli_fetch_array($ambildata)){
    ?>
       <tr>
           <td><?php echo $a['jenis_darah'];?></>
           <td><?php echo $a['stock'];?></td>
           
           
       </tr>
<?php
}
?>
</tbody>
</form>


<form action="aksi.php" method="post">
<table>

<tr>    
<td>jenis darah</td>
<td>:</td>
<td><input type="text" name="jenis_darah" class="input-control"></td>
</tr>
<td>tambahan jumlah kantong darah </td>
<td>:</td>
<td><input type="text" name="tambahan"></td>
</tr>
<tr>
<td></td>
<td></td>
<td>
<button type="submit" name="kirim">Tambah</button>
</td>
</tr>




</table>
</form>
</form>

<form action="aksi2.php" method="post">
<table>

<tr>    
<td>jenis darah</td>
<td>:</td>
<td><input type="text" name="jenis_darah" class="input-control"></td>
</tr>
<td>kurangi jumlah kantong darah </td>
<td>:</td>
<td><input type="text" name="pengurangan"></td>
</tr>
<tr>
<td></td>
<td></td>
<td>

<button type="submit" name="kirim2">kurangi</button>

</td>
</tr>




</table>
</form>

       
</body>
</html>