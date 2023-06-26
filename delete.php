<?php
// mengambil file koneksi.php
include_once("conn.php");
include_once("session.php");

// mengambil id dari url
$id = $_GET['id'];

// Syntax untuk menghapus data berdasarkan id
$result = mysqli_query($koneksi, "DELETE FROM produqu WHERE id='$id'");

// Setelah berhasil dihapus redirect ke index.php
header("Location:hal_utama.php");
