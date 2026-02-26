<?php 
include "koneksi.php";

$id = $_POST['id_produk'];
$jumlah = $_POST['jumlah'];

$query = mysqli_query($conn, "SELECT * FROM produk  WHERE  id=$id");
$data = mysqli_fetch_assoc($query);

echo "<!DOCTYPE html><html><head>
      <link rel='stylesheet' href='css/style.css'>
      <link href='https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:wght@400;600&display=swap' rel='stylesheet'>
      </head><body>";

if ($jumlah > $data['stok']) {
    echo "<script>alert('Stok tidak cukup!'); window.location='index.php';</script>";
}else {
    $total = $data['harga'] * $jumlah;
    $stok_baru = $data['stok'] - $jumlah;

    mysqli_query($conn, "UPDATE produk SET stok=$stok_baru WHERE id=$id");

    echo "
    <div style='font-family: Arial; padding: 20px; border: 2px dashed #000; width: 300px;'>
        <h3>STRUK PEMBAYARAN</h3>
        <p>Produk: {$data['nama_produk']}</p>
        <p>Harga: Rp".number_format($data['harga'])."</p>
        <p>Jumlah: $jumlah</p>
        <hr>
        <h4>TOTAL: Rp".number_format($total)."</h4>
        <a href='index.php'>Kembali ke Kasir</a>
    </div>";
}

?>