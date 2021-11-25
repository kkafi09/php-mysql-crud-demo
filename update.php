<?php
session_start();
require 'functions.php';
require 'config.php';

// mengambil id
$id = $_GET["id"];

// query data dengan id
$studentData = queryDatabase("SELECT * FROM school.student WHERE id = $id")[0];

// ketika tombol submit di tekan
if (isset($_POST["submit"])) {

    // cek data berhasil ditambahkan atau tidak
    if (updateData($_POST)) {
        $_SESSION['info'] = "update";
        echo "<script>document.location.href = 'index.php'</script>";
    } else {
        $_SESSION['info'] = "gagal diupdate";
        echo "<script>document.location.href = 'index.php'</script>";
    }
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
    <title>Update data Siswa</title>
</head>
<body>

<div class="container-sm">
    <h1 class="display-5 mt-4">Update Data Siswa</h1>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $studentData['id'] ?>">
        <ul class="my-5">
            <li class="my-3">
                <label for="nisn" class="col-sm-1 col-form-label">NISN :</label>
                <input type="text" name="nisn" id="nisn" required value="<?= $studentData['nisn'] ?>">
            </li>
            <li class="my-3">
                <label for="nama" class="col-sm-1 col-form-label">Nama :</label>
                <input type="text" name="nama" id="nama" required value="<?= $studentData['name'] ?>">
            </li>
            <li class="my-3">
                <label for="email" class="col-sm-1 col-form-label">Email :</label>
                <input type="text" name="email" id="email" required value="<?= $studentData['email'] ?>">
            </li>
            <li class="my-3">
                <label for="date" class="col-sm-1 col-form-label">Tahun Lahir :</label>
                <input type="date" name="date" id="date" required value="<?= $studentData['date'] ?>">
            </li>
            <li class="my-3">
                <label for="major" class="col-sm-1 col-form-label">Jurusan :</label>
                <input type="text" name="major" id="major" value="<?= $studentData['major'] ?>">
            </li>
            <li>
                <button type="submit" name="submit" class="btn btn-success">Update Data</button>
            </li>

        </ul>
        <br><br>
        <a href="index.php" class="btn btn-primary">Kembali</a>
    </form>
</div>

</body>
</html>
