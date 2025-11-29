<?php
include '../../koneksi.php';

if (isset($_GET['kode'])) {

    $kode = mysqli_real_escape_string($koneksi, $_GET['kode']);

 
    $query = "DELETE FROM barang WHERE kode_barang = '$kode'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>
                alert('Data berhasil dihapus!');
                window.location.href='../../hapus.php';
              </script>";
    } else {
        $err = mysqli_error($koneksi);
        echo "<script>
                alert('Gagal menghapus: $err');
                window.location.href='../../hapus.php';
              </script>";
    }
} else {
    echo "<script>
            alert('Kode barang tidak ditemukan!');
            window.location.href='../../hapus.php';
          </script>";
}
?>
