<?php
session_start();
require 'functions.php';
$id = $_GET["id"];

if (deleteData($id)) {
    $_SESSION['info'] = "hapus";
    echo "<script>document.location.href = 'index.php'</script>";
} else {
    $_SESSION['info'] = "gagal dihapus";
    echo "<script>document.location.href = 'index.php'</script>";
}
