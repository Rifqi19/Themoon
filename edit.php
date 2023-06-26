<?php
include_once("conn.php");
include_once("session.php");

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $namap = $_POST['namap'];
    $warnap = $_POST['warnap'];
    $image_link = $_POST['image_link'];
    $jenisp = $_POST['jenisp'];
    $hargap = $_POST['hargap'];

    $result = mysqli_query($koneksi, "UPDATE produqu SET namap='$namap', warnap='$warnap', image_link='$image_link', jenisp='$jenisp', hargap='$hargap' WHERE id='$id' ");


    header("Location: hal_utama.php");
}
?>
<?php
// Menampilkan data berdasarkan data yang kita pilih.

// Mengambil id dari url
$id = $_GET['id'];

// Syntax untuk mengambil data berdasarkan id
$result = mysqli_query($koneksi, "SELECT * FROM produqu WHERE id='$id'");
while ($produqu = mysqli_fetch_array($result)) {
    $namap = $produqu['namap'];
    $warnap = $produqu['warnap'];
    $image_link = $produqu['image_link'];
    $jenisp = $produqu['jenisp'];
    $hargap = $produqu['hargap'];
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
                <h3 class="mb-4">Edit Produk</h3>
                <br><br>
                <form action="edit.php" method="post" name="edit_produqu">
                <div class="row mb-3">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Nama : </label>
                    <div class="col-sm-10">
                        <input type="text" name="namap" class="form-control" id="colFormLabel" value=<?php echo $namap; ?>>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Warna : </label>
                    <div class="col-sm-10">
                        <input type="text" name="warnap" class="form-control" id="colFormLabel" value=<?php echo $warnap; ?>>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Foto : </label>
                    <div class="col-sm-10">
                        <input type="text" name="image_link" class="form-control" id="colFormLabel" value=<?php echo $image_link; ?>>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Jenis : </label>
                    <div class="col-sm-10">
                        <input type="text" name="jenisp" class="form-control" id="colFormLabel" value=<?php echo $jenisp; ?>>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Harga : </label>
                    <div class="col-sm-10">
                        <input type="number" name="hargap" class="form-control" id="colFormLabel" value=<?php echo $hargap; ?>>
                    </div>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <input type="hidden" name="id" value=<?php echo $id ?>>
                    <button class="btn btn-success" name="update" type="submit" value="Update">Ubah</button>
                </div>
                </form>
            </main>
        </div>
    </div>
</body>

</html>