<?php
    session_start();
    include 'koneksi.php'; 
    if(isset($_POST['login'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $data_user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$user' AND password = '$pass'");
        $r = mysqli_fetch_array($data_user);
        $username = $r['username'];
        $password = $r['password'];
        $level = $r['level'];
        $NIK = $r['NIK'];
        $alamat = $r['alamat'];
        $email = $r['email'];
        $goldar = $r['goldar'];
        
    if($r['level']=="admin"){

    // buat session login dan username
    $_SESSION['username'] = $username;
    $_SESSION['nama_user'] = $r['nama_user'];
    $_SESSION['level'] = "admin";
    // alihkan ke halaman dashboard admin
    header("location:home_admin.php");

    // cek jika user login sebagai user
    }else if($r['level']=="user"){
    // buat session login dan username
    $_SESSION['username'] = $username;
    $_SESSION['nama_user'] = $r['nama_user'];
    $_SESSION['NIK'] = $NIK;
    $_SESSION['alamat'] = $alamat;
    $_SESSION['email'] = $email;
    $_SESSION['goldar'] = $goldar;
    $_SESSION['request'] = $request;
    $_SESSION['gambar'] = $gambar;
    $_SESSION['level'] = "user";

    // alihkan ke halaman dashboard pegawai
    header("location:home_user.php");
    } else if (empty($_POST['username']) or empty($_POST['password'])){
    echo "<script>alert('Data tidak boleh kosong!');</script>";
    }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMI BloodBank</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>

<header>
    <h1>PMI BloodBank</h1>
    <ul>
        
        <!--
        <li><a href="pendaftaran.php">Pendaftaran Online</a></li>
        <li><a href="login.php">Masuk sebagai Admin</a></li>
        -->
        
        <!-- LOGIN -->
        <form class ="form-signin" method="POST"> 
        <li>Username :<br><input class="input-control" type="text" name="user"></li>
        <li>
            Password :<br><input class="input-control" type="password" name="pass">
            
        </li>
        
        
        <li><input  class="btn-login" type="submit" name="login" value="Login"></li>
    </ul>
    </form>
</header>
<!-- Box Formulir -->
<form action ="" method="post">
<section class="boxf">
        <h2>Formulir Pendaftaran</h2>
            <div class="box">
                <table border="0" class="table-form">
                    <tr>
                        <td>NIK-KTP</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="NIK" class="input-control">
                        </td> 
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td>
                        <input type="text" name="nama_user" class="input-control">
                        </td> 
                    </tr>
                     <tr>
                        <td>Username</td>
                        <td>:</td>
                        <td>
                        <input type="text" name="username" class="input-control">
                        </td> 
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td>
                        <input type="password" name="password" class="input-control">
                        </td> 
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>
                        <input type="text" name="alamat" class="input-control">
                        </td> 
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>
                        <input type="text" name="email" class="input-control">
                        </td> 
                    </tr>
                    <tr>
                        <td>Golongan Darah</td>
                        <td>:</td>
                        <td>
                        <input type="radio" name="goldar" class="form-check-input" value="A"> A &nbsp; 
                        <input type="radio" name="goldar" class="form-check-input" value="B"> B &nbsp;
                        <input type="radio" name="goldar" class="form-check-input" value="AB"> AB &nbsp;
                        <input type="radio" name="goldar" class="form-check-input" value="O"> O &nbsp;
                        </td> 
                    </tr>
                    <tr>
                        <td>Pilih Foto Profil</td>
                        <td>:</td>
                        <td>

                        <form action="" method="post" enctype="multipart/form-data">
                        <input type="file" name="gambar" id="fileToUpload">
                        </form>

                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <input type ="hidden" name="level" value="user">
                            <input type ="hidden" name="request" value="0"><br>
                            <input class="btn-daftar" type="submit" name="register" value="  Daftar Sekarang  ">
                        </td>
                    </tr>
                </table>
            </div>
        </form>
        <?php
            if(isset($_POST['register'])){
                include 'koneksi.php';
                $daftar = mysqli_query($conn, "INSERT INTO user VALUES ( 
                    '".@$_POST['NIK']."',
                    '".@$_POST['nama_user']."',
                    '".@$_POST['username']."',
                    '".@$_POST['password']."',
                    '".@$_POST['alamat']."',
                    '".@$_POST['goldar']."',
                    '".@$_POST['email']."',
                    '".@$_POST['level']."',
                    '".@$_POST['gambar']."',
                    '".@$_POST['request']."',
                    '".@$_POST['tgl_donor']."')");
                if($daftar){
                    echo "<script> alert('Registrasi Berhasil');</script>";
                } else {
                    echo "<script> alert('Form tidak boleh kosong');</script>";
                }
            }
        ?>
    </section>
</body>
</html>