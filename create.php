<?php
// Memanggil file koneksi.php
include_once("conn.php");
include_once("session.php");

if (isset($_POST['Submit'])) {
    $namap = $_POST['namap'];
    $warnap = $_POST['warnap'];
    $image_link = $_POST['image_link'];
    $jenisp = $_POST['jenisp'];
    $hargap = $_POST['hargap'];

    $result = mysqli_query($koneksi,"INSERT INTO produqu
            (namap, warnap, image_link, jenisp, hargap)
            VALUES('$namap','$warnap', '$image_link','$jenisp','$hargap')");

    header("Location:hal_utama.php");
    exit();
}
?>

<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-3 p-3 vh-100 bg-dark sidebar">
                <h1 class="text-light mb-5 text-center">GUDANG</h1>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="hal_utama.php">
                            Produk
                        </a>
                        <a class="nav-link text-light" href="hal_utama.php">
                            Logout
                        </a>
                    </li>
                </ul>
            </nav>
            <main class="col-9 p-3">
                <h3 class="mb-4">Tambah Produk</h3>
                <br><br>
                <form action="create.php" method="post" name="tambah" >
                <div class="row mb-3">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Nama : </label>
                    <div class="col-sm-10">
                        <input type="text" name="namap" class="form-control" id="colFormLabel" placeholder="Masukkan nama Produk">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Warna : </label>
                    <div class="col-sm-10">
                        <input type="text" name="warnap" class="form-control" id="colFormLabel" placeholder="Masukkan warna Produk">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Foto : </label>
                    <div class="col-sm-10">
                        <input name="image_link" class="form-control" id="colFormLabel" placeholder="Masukkan link foto Produk">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Jenis : </label>
                    <div class="col-sm-10">
                        <input type="text" name="jenisp" class="form-control" id="colFormLabel" placeholder="Masukkan jenis Produk">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Harga : </label>
                    <div class="col-sm-10">
                        <input type="number" name="hargap" class="form-control" id="colFormLabel" placeholder="Masukkan harga Produk">
                    </div>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-success" name="Submit" type="submit">Tambah</button>
                </div>
                </form>
            </main>
        </div>
    </div>
</body>

</html>
