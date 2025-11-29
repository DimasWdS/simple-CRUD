<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update</title>
    <link rel="stylesheet" href="css/universal.css" />
  </head>
  <body>
    <section class="container-sidebar"></section>
        <main>
      <br>
      <table>
        <tr>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Kategori</th>
          <th>Harga</th>
          <th>Stok</th>
          <th>Aksi</th>
        </tr>

        <?php
        include 'koneksi.php';

        $query  = "SELECT * FROM barang";
        $result = mysqli_query($koneksi, $query);

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row['kode_barang']; ?></td>
            <td><?php echo $row['nama_barang']; ?></td>
            <td><?php echo $row['kategori']; ?></td>
            <td>Rp <?php echo number_format($row['harga_jual'], 0, ',', '.'); ?></td>
            <td><?php echo $row['stok']; ?></td>

            <td>

            

          

              <a href="code_aksi/update/edit.php?id=<?php echo $row['kode_barang']; ?>"  class="update-btn">
            <span></span>
              <span>Update</span>
            </a>
        
            </td>
          </tr>
        <?php } ?>
      </table>
    </main>
    <script >
      const lokasi='update'
      console.log(lokasi)
      </script>
      <script type="module" src="javascrip/update.js"></script>
  </body>
</html>
