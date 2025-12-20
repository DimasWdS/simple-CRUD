<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jual</title>
    <link rel="stylesheet" href="../../css/universal.css">
    <link rel="stylesheet" href="../../css/universalv2.css">
    <link rel="stylesheet" href="../../css/transaksi/transaksi.css">
    <link rel="stylesheet" href="../../css/jual/jual.css">
</head>
<body>

<main>
    <a class="hbgskn" href="../../transaksi.php">Kembali</a>
    <h1>Detail Barang</h1>

    <section class="container-table">
        <table>
            <tr>
            <td>Kode Barang</td>
            <td>Nama Barang</td>
            <td>Harga </td>
            <td>Stok</td>
            <td>Keterangan (stok)</td>
          </tr>
        <?php
         include '../../koneksi.php';
         
         $id = $_GET['id'];

          $queryJual = "SELECT * FROM barang WHERE kode_barang= '$id'";

          $resultJual = mysqli_query($koneksi, $queryJual);

          while ($row = mysqli_fetch_assoc($resultJual)) {
          ?>
              <tr class="table-barang">                  
                  <td><?= $row['kode_barang']; ?></td>                  
                  <td><?= $row['nama_barang']; ?></td>                  
                  <td>Rp <?= number_format($row['harga_jual'], 0, ',', '.'); ?></td>
                  <td><?= $row['stok']; ?></td>
                  <td><?= $row['keterangan']; ?></td>
              </tr>
          <?php
              }
       ?>
        </table>
    </section>  
</main>
    
</body>
</html>