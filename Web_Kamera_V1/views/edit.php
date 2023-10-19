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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $merk = $_POST['merk'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $query = "UPDATE barang_form SET nama='$nama',merk='$merk',jenis='$jenis', harga='$harga', stok='$stok' WHERE id=$id";
    $result = mysqli_query($conn2, $query);

    if ($result) {
        echo "
        <script>
            alert('Data berhasil diubah!');
            document.location.href = 'dashboard.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data Gagal Diubah ! ');
            document.location.href = 'dashboard.php';
        </script>";
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
                <h1>Tambah Data</h1>
                <a href="../index.html"><img class="icon" src="../img/x_icon.png" alt="x-icon"></a>
            </div>
            <form action="" method="post">
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
                        <option value="kamera">Kamera</option>
                        <option value="aksesoris">Aksesoris</option>
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
                <div class="field">
                    <input class="btn" type="submit" name="edit" value="Edit Data">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<section>
    