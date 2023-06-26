<?php
include_once("session.php");
// memanggil library FPDF
require('fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l', 'mm', 'A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);
// mencetak string
$pdf->Cell(270, 7, 'GUDANG QU', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(270, 7, 'DAFTAR PRODU QU', 0, 1, 'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(15, 6, 'No Id', 1, 0);
$pdf->Cell(60, 6, 'Nama', 1, 0);
$pdf->Cell(25, 6, 'Warna', 1, 0);
$pdf->Cell(110, 6, 'Link Foto', 1, 0);
$pdf->Cell(45, 6, 'Jenis', 1, 0);
$pdf->Cell(25, 6, 'Harga', 1, 1);
$pdf->SetFont('Arial', '', 10);
include_once('conn.php');
$produqu = mysqli_query($koneksi, "select * from produqu");
while ($row = mysqli_fetch_array($produqu)) {
    $pdf->Cell(15, 6, $row['id'], 1, 0);
    $pdf->Cell(60, 6, $row['namap'], 1, 0);
    $pdf->Cell(25, 6, $row['warnap'], 1, 0);
    $pdf->Cell(110, 6, $row['image_link'], 1, 0);
    $pdf->Cell(45, 6, $row['jenisp'], 1, 0);
    $pdf->Cell(25, 6, $row['hargap'], 1, 1);
}
$pdf->Output();
