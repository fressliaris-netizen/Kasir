<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Woody POS</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="card">
    <h2>Woody POS</h2>
    <form action="proses_bayar.php" method="POST">
        <label>Pilih Produk</label>
        <select name="id_produk" required>
            <option value="" disabled selected>Pilih menu...</option>
            <?php
            $ambil_produk = mysqli_query($conn, "SELECT * FROM produk WHERE stok > 0");
            while($p = mysqli_fetch_array($ambil_produk)){
                echo "<option value='".$p['id']."'>".$p['nama_produk']." — Rp".number_format($p['harga'],0,',','.')."</option>";
            }
            ?>
        </select>

        <label>Jumlah Pesanan</label>
        <input type="number" name="jumlah" min="1" required>

        <button type="submit">Konfirmasi Pesanan</button>
    </form>
</div>

</body>
</html>