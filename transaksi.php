<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <link rel="stylesheet" href="css/universal.css">
    <link rel="stylesheet" href="css/universalv2.css">
    <link rel="stylesheet" href="css/index/group.css">
    <link rel="stylesheet" href="css/transaksi/transaksi.css">
</head>
<body>
      

    <main>
        <section class="container-navigasi">
    <ul>
      <li>
        <a href="index.php">Semua Data</a>
      </li>
      <li>
        <a href="transaksi.php">Data Transaksi</a>
      </li>
    </ul>
  </section>


  <section class="container-transaksi display-none">
    
       <section class="container-filter">
           <form  method="GET">
            <div>
              <label for="">Cari Nama Barang</label>
            <input type="text" name="cari-barang" id="cari-barang" 
                   value="<?= isset($_GET['cari-barang']) ? htmlspecialchars($_GET['cari-barang']) : '' ?>" >
            </div>
            <div>
            <button type="submit" name="filterkan">Submit</button>
          </div>
          </form>
       </section>



       <section class="container-table">
        <h1>Barang Yang Tersedia</h1>
        <table>
          <tr>         
            <td>Nama Barang</td>
            <td>Harga </td>
            <td>Stok</td>
            <td>Keterangan (stok)</td>
            <td>Aksi</td>
          </tr>

       <?php
include 'koneksi.php';

$queryTransaksi = "SELECT * FROM barang";
$conditions = [];


if (isset($_GET['cari-barang']) && !empty($_GET['cari-barang'])) {
    $keyword = mysqli_real_escape_string($koneksi, $_GET['cari-barang']);
    $conditions[] = "nama_barang LIKE '%$keyword%'";
}


if (!empty($conditions)) {
    $queryTransaksi .= " WHERE " . implode(" AND ", $conditions);
}


$resultTransaksi = mysqli_query($koneksi, $queryTransaksi);

if (!$resultTransaksi) {
    echo "<tr><td colspan='6'>Error: " . mysqli_error($koneksi) . "</td></tr>";
} elseif (mysqli_num_rows($resultTransaksi) == 0) {
    echo "<tr><td colspan='6' style='text-align:center;'>Tidak ada data barang yang cocok.</td></tr>";
} else {
    while ($row = mysqli_fetch_assoc($resultTransaksi)) {
?>
<tr class="table-barang">
    <td><?= htmlspecialchars($row['nama_barang']); ?></td>
    <td>Rp <?= number_format($row['harga_jual'], 0, ',', '.'); ?></td>
    <td><?= $row['stok']; ?></td>
    <td><?= htmlspecialchars($row['keterangan']); ?></td>
    <td>
        <a href="code_aksi/jual/jual.php?id=<?= $row['kode_barang']; ?>" class="update-btn">
            <span class="sell-icon"></span>
            <span>Jual</span>
        </a>
    </td>
</tr>
<?php
    }
}
?>

          

        </table>
       </section>

  </section>

    </main>

      

<script type="module" src="javascrip/transaksi.js"></script>

</body>
</html>