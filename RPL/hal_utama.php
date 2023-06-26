<?php
include_once("conn.php");
include_once("session.php");
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $result = mysqli_query($koneksi, "SELECT * FROM produqu WHERE namap LIKE '%$keyword%' ");
} else {
    $keyword = '';
    $result = mysqli_query($koneksi, "SELECT * FROM produqu ");
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
                <h2 class="text-light mb-5 text-center">GUDANG</h2>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="hal_utama.php">
                            ProduQu
                        </a>
                        <a class="nav-link text-light" href="logout.php">
                            Logout
                        </a>
                    </li>
                </ul>
            </nav>
            <main class="col-9 p-3">
                <h3 class="mb-4">Daftar ProduQu</h3>
                <div class="d-flex justify-content-end gap-2 w-100 mb-4">
                    <a href="cetak.php" class="btn btn-outline-warning">Unduh</a>
                    <a href="create.php" class="btn btn-warning float-end">Tambah ProduQu</a>
                </div>

                <form action="" method="GET">
                    <input class="form-control" type="text" name="keyword" placeholder="Cari produk berdasarkan nama"
                        value="<?php echo $keyword; ?>" />
                </form>

                <table class="table table-hover">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Warna</th>
                        <th>Foto</th>
                        <th>Jenis</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                    <?php if ($result->num_rows > 0): ?>
                        <?php
                        $index = 1;
                        while ($produqu = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $index . "</td>";
                            echo "<td>" . $produqu['namap'] . "</td>";
                            echo "<td>" . $produqu['warnap'] . "</td>";
                            echo "<td><img src='" . $produqu['image_link'] . "' width='150px' /></td>";
                            echo "<td>" . $produqu['jenisp'] . "</td>";
                            echo "<td>Rp " . $produqu['hargap'] . "</td>";
                            echo "<td><a class='btn btn-success' href='edit.php?id=$produqu[id]'role= button'>Ubah</a></br></br><a class='btn btn-danger' href='delete.php?id=$produqu[id]' 'role= button'>Hapus</a></td></tr>";
                            $index++;
                        }
                        ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" align="center">Data tidak di temukan!</td>
                        </tr>
                    <?php endif; ?>
                </table>
            </main>
        </div>
    </div>
</body>

</html>