<?php  
    $id = $_GET['id'];
    if(isset($_POST['nama_produk'])) {
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama_produk']);
        $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);
        $stock = mysqli_real_escape_string($koneksi, $_POST['stock']);

        $query = mysqli_query($koneksi, "UPDATE produk SET nama_produk='$nama', harga='$harga', stock='$stock' WHERE id_produk='$id'");
        if($query) {
            echo '<script>alert("Ubah Data Berhasil"); location.href="?page=produk";</script>';
        } else {
            echo '<script>alert("Ubah Data Gagal: '.mysqli_error($koneksi).'");</script>';
        }
    }

    $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id'");
    $data = mysqli_fetch_array($query);
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">produk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Produk</li>
    </ol>
    <a href="?page=Produk" class="btn btn-danger">Kembali</a>
    <hr>
    
    <form method="post">
        <table class="table table-bordered">
            <tr>
                <td width="200">Nama Produk</td>
                <td width="1">:</td>
                <td><input class="form-control" value="<?php echo htmlspecialchars($data['nama_produk']); ?>" type="text" name="nama_produk" required></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td>
                    <textarea name="harga" rows="5" class="form-control"><?php echo htmlspecialchars($data['harga']); ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Stock</td>
                <td>:</td>
                <td><input class="form-control" type="number" value="<?php echo htmlspecialchars($data['stock']); ?>" name="stock"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </td>
            </tr>
        </table>
    </form>
</div>
