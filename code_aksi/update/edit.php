<?php
include '../../koneksi.php';

$id = $_GET['id'];

$query = "SELECT * FROM barang WHERE kode_barang='$id'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Barang</title>
</head>
<body>

<h2>Edit Data Barang</h2>

<form action="update_proses.php" method="POST">
    <input type="hidden" name="kode_barang" value="<?= $data['kode_barang'] ?>">

    <label>Nama Barang:</label><br>
    <input type="text" name="nama_barang" value="<?= $data['nama_barang'] ?>"><br><br>

    <label>Kategori:</label><br>
    <input type="text" name="kategori" value="<?= $data['kategori'] ?>"><br><br>

    <label>Harga Jual:</label><br>
    <input type="number" name="harga_jual" value="<?= $data['harga_jual'] ?>"><br><br>

    <label>Stok:</label><br>
    <input type="number" name="stok" value="<?= $data['stok'] ?>"><br><br>

    <button type="submit">Simpan Perubahan</button>
</form>

</body>
</html>
