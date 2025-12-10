
<?php
include '../../koneksi.php';

$kode = $_POST['kode_barang'];
$nama = $_POST['nama_barang'];
$kategori = $_POST['kategori'];
$harga = $_POST['harga_jual'];
$stok = $_POST['stok'];
$keterangan =$_POST['keterangan'];

$query = "UPDATE barang SET 
            nama_barang='$nama',
            kategori='$kategori',
            harga_jual='$harga',
            stok='$stok',
            keterangan='$keterangan'
          WHERE kode_barang='$kode'";

mysqli_query($koneksi, $query);

header("Location: ../../update.php"); 
exit;
?>
