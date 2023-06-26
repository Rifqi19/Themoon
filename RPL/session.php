<?php
include "conn.php";
$sql = "SELECT * FROM userqu ORDER BY username";
$tampil = mysqli_query($koneksi, $sql);

session_start();

if (!isset($_SESSION['username']) and !isset($_SESSION['username'])) {

	header("Location: index.php");
    die();
}
