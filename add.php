<?php
session_start();
require 'functions.php';
include 'config.php';

if (isset($_POST["submit"])) {
    if (addData($_POST) == 0) {
        $_SESSION['info'] = "simpan";
        echo "<script>document.location.href = 'index.php'</script>";
    } else if(addData($_POST) == 1) {
        $_SESSION['info'] = "gagal masuk karena duplikat";
        echo "<script>document.location.href = 'index.php'</script>";
    } else{
        $_SESSION['info'] = "gagal masuk";
        echo "<script>document.location.href = 'index.php'</script>";
    }
} else {
    $_SESSION['info'] = "void";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assests/style.css">
    <title>Tambah data Siswa</title>
</head>
<body>
<div class="container">
    <h1 class="display-5 mt-4">Tambah Data Siswa</h1>

    <form action="" method="post">
        <ul class="my-5">
            <li class="my-3">
                <label for="nisn" class="col-sm-1 col-form-label">NISN :</label>
                <input type="text" name="nisn" id="nisn" required placeholder="NISN" minlength="10" maxlength="10">
            </li>
            <li class="my-3">
                <label for="nama" class="col-sm-1 col-form-label">Nama :</label>
                <input type="text" name="nama" id="nama" required placeholder="Masukkan nama anda">
            </li>
            <li class="my-3">
                <label for="email" class="col-sm-1 col-form-label">Email :</label>
                <input type="email" name="email" id="email" required placeholder="Masukkan email anda">
            </li>
            <li class="my-3">
                <label for="date" class="col-sm-1 col-form-label">Tahun Lahir :</label>
                <input type="date" name="date" id="date" required placeholder="Masukkan tahun lahir anda">
            </li>
            <li class="my-3">
                <label for="major" class="col-sm-1 col-form-label">Jurusan :</label>
                <input type="text" name="major" id="major" placeholder="Masukkan jurusan anda">
            </li>
            <li class="my-3">
                <button type="submit" name="submit" class="btn btn-success">Tambah Data</button>
            </li>

        </ul>
        <br><br>
        <a href="index.php" class="btn btn-primary">Kembali</a>
    </form>
</div>
</body>
</html>
