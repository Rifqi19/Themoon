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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
    />
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-3 p-3 bg-dark  w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none">
                <h2 class="text-light mb-5 text-center">GUDANG</h2>
                <ul class="nav">
                    <li class="nav-item">
                    <button class="w3-bar-item w3-button text-light mb-3" onclick="w3_close()">Close &times;</button>
                        <a class="nav-link text-light w3-bar-item w3-button mb-3" href="hal_utama.php">
                            Produk
                        </a>
                        <a class="nav-link text-light w3-bar-item w3-button mb-3" href="logout.php">
                            Logout
                        </a>
                    </li>
                </ul>
            </nav>
            <main class="col-12 p-3"  id="main">
                <button id="openNav"class="btn btn-success mb-3" id="button-toggle" onclick="w3_open()">&#9776
                </button>
                <h3 class="mb-4">Daftar Produk</h3>
                <div class="d-flex justify-content-end gap-2 w-100 mb-4">
                    <a href="cetak.php" class="btn btn-secondary">Unduh</a>
                    <a href="create.php" class="btn btn-warning float-end">Tambah Produk</a>
                </div>

                <form action="" method="GET">
                    <input class="form-control" type="text" name="keyword" placeholder="Cari produk berdasarkan nama"
                        value="<?php echo $keyword; ?>" />
                </form>

                <table class="table table-hover">
                    <tr class="bg-dark text-light">
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
    <script>
    function w3_open() {
        document.getElementById("main").style.width = "80%";
        document.getElementById("main").style.marginLeft = "20%";
        document.getElementById("sidebarMenu").style.width = "20%";
        document.getElementById("sidebarMenu").style.height = "100%";
        document.getElementById("sidebarMenu").style.display = "block";
        document.getElementById("openNav").style.display = 'none';
    }
    function w3_close() {
        document.getElementById("main").style.marginLeft = "0%";
        document.getElementById("main").style.width = "100%";
        document.getElementById("sidebarMenu").style.display = "none";
        document.getElementById("openNav").style.display = "inline-block";
    }
    </script>
</body>


</html>