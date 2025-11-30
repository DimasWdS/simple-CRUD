<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="css/universal.css" />
    <link rel="stylesheet" href="css/universalv2.css" />
  </head>
  <body>
    <section class="container-sidebar"></section>

    <main>
      <br>
      <section class="container-table">

      
      <table>
        <tr>
          <td>Kode Barang</td>
          <td>Nama Barang</td>
          <td>Kategori</td>
          <td>Harga</td>
          <td>Stok</td>
        </tr>

        <?php
        include 'koneksi.php';

        $query  = "SELECT * FROM barang";
        $result = mysqli_query($koneksi, $query);

        // Jika query error
        if (!$result) {
            echo "<tr><td colspan='5'>Error: " . mysqli_error($koneksi) . "</td></tr>";
        }

        // Jika tidak ada data
        if (mysqli_num_rows($result) == 0) {
            echo "<tr><td colspan='5'>Tidak ada data barang.</td></tr>";
        }

        // Jika ada data → tampilkan
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr class="table-barang">
                <td><?= $row['kode_barang']; ?></td>
                <td><?= $row['nama_barang']; ?></td>
                <td><?= $row['kategori']; ?></td>
                <td>Rp <?= number_format($row['harga_jual'], 0, ',', '.'); ?></td>
                <td><?= $row['stok']; ?></td>
            </tr>
        <?php
        }
        ?>
      </table>
</section>
    </main>

    <script>
      let lokasi='home'
      console.log(lokasi)
      </script>
      <script type="module" src="javascrip/index.js"></script>
  </body>
</html>
