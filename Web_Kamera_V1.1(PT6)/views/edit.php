<?php
@include 'config.php';

$id = $_GET['id'];
$query = "SELECT * FROM barang_form WHERE id=$id";
$result = mysqli_query($conn2, $query);
$brg = [];
while ($row = mysqli_fetch_assoc($result)){
    $brg[] = $row;
};

$brg = $brg[0];

if (isset($_POST['update'])){
    // Ambil data lainnya dari form
    $nama = $_POST['nama'];
    $merk = $_POST['merk'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $img = $_FILES['gambar']['name'];
    $explode = explode(',', $img);
    $ekstensi = strtolower(end($explode));
    $gambar_baru = "$nama.$ekstensi";
    $tmp = $_FILES['gambar']['tmp_name'];

    if (move_uploaded_file($tmp, '../assets/' . $gambar_baru)) {
        // Hapus gambar lama jika diperlukan
        $result = mysqli_query($conn2, "UPDATE barang_form SET nama='$nama', merk='$merk', jenis='$jenis', harga='$harga', stok='$stok', gambar='$gambar_baru' WHERE id='$id'");
        if ($result){
            echo "
            <script>
                alert('Data berhasil diperbarui!');
                document.location.href = 'dashboard.php'
            </script>";
        } else {
            echo "
            <script>
                alert('Data Gagal Diperbarui ! ');
                document.location.href = 'dashboard.php'
            </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Edit Data</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <div class="up-box">
                <h1>Update Data</h1>
                <a href="../index.html"><img class="icon" src="../img/x_icon.png" alt="x-icon"></a>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="field input">
                    <label for="nama">Nama Barang</label>
                    <input type="text" name="nama"
                    value="<?php echo $brg['nama']?>" class="textfield" required>
                </div>
                <div class="field input">
                    <label for="merk">Merk</label>
                    <input type="text" name="merk" 
                    value="<?php echo $brg['merk']?>"class="textfield" required>
                </div>
                <div class="field input">
                    <label for="jenis">Jenis</label>
                    <select name="jenis">
                        <option value="kamera" <?php if ($brg['jenis'] === 'kamera') echo 'selected'; ?>>Kamera</option>
                        <option value="aksesoris" <?php if ($brg['jenis'] === 'aksesoris') echo 'selected'; ?>>Aksesoris</option>
                    </select>
                </div>
                <div class="field input">
                    <label for="harga">Harga</label>
                        <input type="text" name="harga" 
                        value="<?php echo $brg['harga']?>"class="textfield" required>
                </div>
                <div class="field input">
                    <label for="stok">Stok</label>
                    <input type="text" name="stok"
                    value="<?php echo $brg['stok']?>" class="textfield" required>
                </div>
                <div class="field input">
                    <label for="gambar">Gambar</label>
                    <img src="../assets/<?php echo $brg['gambar']; ?>" alt="Gambar Produk">
                    <input type="file" name="gambar" class="textfield" autocomplete="off">
                </div>
                <div class="field">
                    <input class="btn" type="submit" name="update" value="Edit Data">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<section>
    