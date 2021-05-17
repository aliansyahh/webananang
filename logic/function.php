<?php

$conn = mysqli_connect("localhost", "root", "", "crud");

function upload()
{
    $nameFile = $_FILES["gambar"]["name"];
    $tmp = $_FILES["gambar"]["tmp_name"];
    $error = $_FILES["gambar"]["error"];
    $size = $_FILES["gambar"]["size"];

    if ($error === 4) {
        echo "<script>alert('Upload Gambar Terlebih Dahulu')</script>";
        return false;
    }

    if ($size > 1000000) {
        echo "<script>alert('Gambar Yang Diupload Terlalu Besar')</script>";
        return false;
    }

    $extentionValid = ["jpg", "jpeg", "png"];
    $extention = explode(".", $nameFile);
    $extention = strtolower(end($extention));
    if (!in_array($extention, $extentionValid)) {
        echo "<script>alert('Yang Diupload Bukan Gambar')</script>";
        return false;
    }

    $newName = uniqid();
    $newName .= ".";
    $newName .= $extention;
    move_uploaded_file($tmp, "template/img/" . $newName);
    return $newName;
}

function tampil($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($post)
{
    global $conn;
    $nama = htmlspecialchars($_POST["nama"]);
    $npm = htmlspecialchars($_POST["npm"]);
    $email = htmlspecialchars($_POST["email"]);
    $jurusan = htmlspecialchars($_POST["jurusan"]);
    $gambar = upload();

    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO mahasiswa VALUES (NULL,'$nama','$npm','$email','$jurusan','$gambar')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubah($post)
{
    global $conn;
    $id = htmlspecialchars($_POST["id"]);
    $gambarLama = htmlspecialchars($_POST["gambarLama"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $npm = htmlspecialchars($_POST["npm"]);
    $email = htmlspecialchars($_POST["email"]);
    $jurusan = htmlspecialchars($_POST["jurusan"]);
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gmbar = $gambar = upload();
    }

    if (!$gambar) {
        return false;
    }

    $query = "UPDATE mahasiswa SET 
    nama='$nama',
    npm='$npm',
    email='$email',
    jurusan='$jurusan',
    gambar='$gambar' WHERE id =$id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id=$id");
    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%'";
    return tampil($query);
}