<?php

require 'config.php';

// query ke database
function queryDatabase($query)
{
    global $connect;
    $result = mysqli_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// tambah data
function addData($data)
{
    global $connect;
    $nisn = htmlspecialchars($data["nisn"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $date = htmlspecialchars($data["date"]);
    $major = htmlspecialchars($data["major"]);

    $query = "INSERT INTO school.student VALUES (null, '$nisn', '$nama', '$email', '$date', '$major')";
    $check = mysqli_num_rows(mysqli_query($connect, "SELECT nisn FROM school.student WHERE nisn='$nisn'"));

    if ($check == 0) {
        if ($nisn != "" || $nama != "" || $date != "" || $email != "" || $major != "") {
            mysqli_query($connect, $query);
        }
    }

    return $check;
}

function deleteData($id)
{
    global $connect;
    $query = "DELETE FROM school.student WHERE id = $id";
    mysqli_query($connect, $query);

    return mysqli_affected_rows($connect);
}

function updateData($data)
{
    global $connect;
    $id = $data["id"];
    $nisn = htmlspecialchars($data["nisn"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $date = htmlspecialchars($data["date"]);
    $major = htmlspecialchars($data["major"]);

    $query = "UPDATE school.student SET
                           nisn = '$nisn',
                           name = '$nama',
                           date = '$date',
                           email = '$email',
                           major = '$major',
                WHERE id = $id
                       ";

    mysqli_query($connect, $query);

    return mysqli_affected_rows($connect);
}

function searchData($keyword)
{
    $query = "SELECT * FROM school.student WHERE name LIKE '%$keyword%' OR nisn LIKE '%$keyword%' OR date LIKE '%$keyword' OR email LIKE '%$keyword' OR major LIKE '%$keyword'";

    return queryDatabase($query);
}

?>