<?php

require '../functions.php';
$keyword = $_GET['keyword'];
$query = "SELECT * FROM school.student WHERE name LIKE '%$keyword%' OR nisn LIKE '%$keyword%' OR date LIKE '%$keyword' OR email LIKE '%$keyword' OR major LIKE '%$keyword'";

$students = queryDatabase($query);

?>

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
