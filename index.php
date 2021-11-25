<?php
session_start();
require 'functions.php';

$students = queryDatabase("SELECT * FROM school.student ORDER BY name ASC ");

if (isset($_POST['search'])) {
    $students = searchData($_POST['keyword']);
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
    <!--    sweet alert-->
    <title>Student Management Web</title>
</head>
<body>
<div class="container w-75">
    <div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
        echo $_SESSION['info'];
    }
    unset($_SESSION['info']); ?>"></div>
    <h1 class="display-5 mt-2 text-center my-5">Daftar Siswa</h1>
    <a href="index.php" class="btn btn-secondary shadow-sm my-4 rounded">Refresh</a>
    <a href="add.php" class="btn btn-primary shadow-sm my-4 rounded">Tambah data siswa</a>
    <form action="" method="post" class="float-end form-style align-middle">
        <input type="text" name="keyword" class="align-middle" autocomplete="off" autofocus id="keyword">
        <button type="submit" name="search" autofocus class="btn btn-primary shadow-sm my-4 rounded" id="submit-search">Search</button>
    </form>
    <div id="container-ajax">
        <table class="table table-responsive table-bordered table-striped shadow-sm rounded">
            <tr class="table-primary">
                <th class="text-center">No.</th>
                <th class="text-center">NISN</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Email</th>
                <th class="text-center">Tahun Lahir</th>
                <th class="text-center">Jurusan</th>
                <th class="text-center">Aksi</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($students as $std) : ?>
                <tr>
                    <td class="align-middle text-center"><?= $i ?></td>
                    <td class="align-middle"><?= $std["nisn"] ?></td>
                    <td class="align-middle"><?= $std["name"] ?></td>
                    <td class="align-middle"><?= $std["email"] ?></td>
                    <td class="align-middle"><?= $std["date"] ?></td>
                    <td class="align-middle"><?= $std["major"] ?></td>
                    <td class="align-middle text-center">
                        <a href="update.php?id=<?= $std["id"] ?>" class="btn btn-primary">Edit</a>
                        <a href="delete.php?id=<?= $std["id"] ?>" class="btn btn-danger delete-data">Delete</a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<!-- Swal -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.15.2/dist/sweetalert2.all.min.js"></script>
<script src="script.js"></script>
</body>
</html>
