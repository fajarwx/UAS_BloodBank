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
    <title>Dashboard User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <style type="text/css">
     
    table {
      border: 1px solid black;
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
 		<tr>    
            </tr>
            <h1 class="display-4">Halo, <?= $_SESSION['nama_user'] ?></h1>
            <p class="lead"> Selamat datang, anda berhasil login sebagai <b><?= $_SESSION['level']?></b></p>
            <hr class="my-4">
            <a class="btn btn-danger btn-lg" href="logout.php" role="button">Log out</a>
        </div>
    </div>
    <form>
<h1 align="center"> Stok Darah</h1>
    <table border="0" class="table-striped" width="600px" align="center">
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
</table>
</form>
<br><br><br><hr><br><br>

<form action ="aksipesan.php" method="post">
<section class="boxf">
            <div class="box">
            <h1 align="center">Formulir Pemesanan darah</h1>
                <table border="1" class="table-form">
                    <tr>
                        <td>NIK-KTP</td>
                        <td>:</td>
                        <td>
                        <?= $_SESSION['NIK'] ?>
                        </td> 
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td>
                        <?= $_SESSION['nama_user'] ?>
                        </td> 
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>
                        <?= $_SESSION['alamat'] ?>
                        </td> 
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>
                        <?= $_SESSION['email'] ?>
                        </td> 
                    </tr>
                    <tr>
                        <td>Golongan Darah</td>
                        <td>:</td>
                        <td>
                        <?= $_SESSION['goldar'] ?>
                        </td> 
                    </tr>
                    <tr>
                        <td>Jumlah darah yang akan dipesan</td>
                        <td>:</td>
                        <td>
                        <input type="text" name="tambahan" class="input-control">
                        </td> 
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <input type ="hidden" name="level" value="user">
                            <input class="btn btn-primary" type="submit" name="kirim" value="  Pesan Sekarang  ">
                        </td>
                    </tr>
                </table>
            </div>
        </form>
<br><br><hr>
<form action ="aksidonor.php" method="post">
<section class="boxf">
            <div class="box">
            <h1 align="center">Formulir donor darah</h1>
                <table border="1" class="table-form">
                    <tr>
                        <td>NIK-KTP</td>
                        <td>:</td>
                        <td>
                        <?= $_SESSION['NIK'] ?>
                        </td> 
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td>
                        <?= $_SESSION['nama_user'] ?>
                        </td> 
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>
                        <?= $_SESSION['alamat'] ?>
                        </td> 
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>
                        <?= $_SESSION['email'] ?>
                        </td> 
                    </tr>
                    <tr>
                        <td>Golongan Darah</td>
                        <td>:</td>
                        <td>
                        <?= $_SESSION['goldar'] ?>
                        </td> 
                    </tr>
                    <tr>
                        <td>Tanggal donor</td>
                        <td>:</td>
                        <td>
                        <input type="date" name="tanggal" class="input-control">
                        </td> 
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <input type ="hidden" name="level" value="user">
                            <input class="btn btn-primary" type="submit" name="kirim2" value="  Pesan Sekarang  ">
                        </td>
                    </tr>
                </table>
            </div>
        </form>
</body>
</html>