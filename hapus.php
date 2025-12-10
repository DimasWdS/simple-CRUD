

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hapus data</title>
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
          <td>Aksi</td>
        </tr>

        <?php
        include 'koneksi.php';

        $query  = "SELECT * FROM barang";
        $result = mysqli_query($koneksi, $query);

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr class="table-barang">
            <td><?php echo $row['kode_barang']; ?></td>
            <td><?php echo $row['nama_barang']; ?></td>
            <td><?php echo $row['kategori']; ?></td>
            <td>

            

          

              <a  class="hapus-btn"
              href="code_aksi/hapus/hapus_data.php?kode=<?php echo $row['kode_barang']; ?>" 
              onclick="return confirm('Yakin ingin menghapus data ini?')"
              >
            <span></span>
              <span>Hapus</span>
            </a>
        
            </td>
          </tr>
        <?php } ?>
      </table>
     </section>
    </main>

    <script >
      const lokasi='hapus'
      console.log(lokasi)
      </script>
      <script type="module" src="javascrip/hapus.js"></script>
  </body>
</html>
