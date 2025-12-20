<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Data</title>
    <link rel="stylesheet" href="css/universal.css" />
    <link rel="stylesheet" href="css/universalv2.css" />
    <link rel="stylesheet" href="css/tambah/tambah.css">
  </head>
  <body>
    <section class="container-sidebar"></section>

    <main>
      <br>
      <form class="tambah" action="" method="post">
      <div>
        <label for="kode-barang">Masukan Kode barang </label>
        <input id="kode-barang" class="hjgy" type="text" name="kode_barang" required>
      </div>
      <div>
        <label for="nama-barang">Masukan nama barang</label>
        <input id="nama-barang" class="hjgy" type="text" name="nama_barang" required>
      </div>
      <div>
        <label for="kategori">Masukan kategori</label>
        <input id="kategori" class="hjgy" type="text" name="kategori" required>
      </div>
      <div>
        <label for="harga">Masukan Harga barang </label>
        <input id="harga" class="hjgy" type="number" name="harga" required>
      </div>
      <div>
        <label for="stok">Masukan stok barang</label>
        <input id="stok" class="hjgy" type="number" name="stok" required>
      </div>
      <div>
        <label for="stok">Masukan keterangan stok barang</label>
        <input id="keterangan" class="hjgy" type="teks" name="keterangan" required>
      </div>
      <div>
        <button href="#" class="tambah-btn" type="submit" name="proses"><span></span><span>Tabahkan</span></button>
      </div>
       
          
          
         
         

        <?php
        if (isset($_POST['proses'])) {

            include 'koneksi.php';

            $kode_barang = mysqli_real_escape_string($koneksi, $_POST['kode_barang']);
            $nama_barang = mysqli_real_escape_string($koneksi, $_POST['nama_barang']);
            $kategori    = mysqli_real_escape_string($koneksi, $_POST['kategori']);
            $harga       = (int) $_POST['harga'];
            $stok        = (int) $_POST['stok'];
            $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);

            // Query
            $query = "INSERT INTO barang (kode_barang, nama_barang, kategori, harga_jual, stok,keterangan) 
                      VALUES ('$kode_barang', '$nama_barang', '$kategori', '$harga', '$stok','$keterangan')";

            $result = mysqli_query($koneksi, $query);

            if ($result) {
                echo "<script>
                        alert('Data berhasil ditambahkan!');
                        window.location.href='index.php';
                      </script>";
            } else {
                $err = mysqli_error($koneksi);
                echo "<script>alert('Gagal menambahkan data: $err');</script>";
            }
        }
        ?>
      </form>
    </main>

    <script >
      const lokasi='tambah'
      console.log(lokasi)
      </script>
      <script type="module" src="javascrip/tambah.js"></script>
  </body>
</html>
