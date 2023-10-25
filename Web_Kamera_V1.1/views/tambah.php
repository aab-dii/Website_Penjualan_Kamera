<?php
@include 'config.php';

if (isset($_POST['tambah'])){
    $nama = $_POST['nama'];
    $merk = $_POST['merk'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $date = date('Y-m-d');

    $img = $_FILES['gambar']['name'];
    $explode = explode(',',$img);
    $ekstensi = strtolower(end($explode));
    $gambar_baru = "$date.$nama.$ekstensi";
    $tmp = $_FILES['gambar']['tmp_name'];

    if(move_uploaded_file($tmp,'../assets/'.$gambar_baru)){
        $result = mysqli_query($conn2, "INSERT INTO barang_form (id, nama, merk, jenis, harga, stok, gambar) VALUES ('','$nama','$merk', '$jenis','$harga','$stok','$gambar_baru')");

        if ($result){
            echo "
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'dashboard.php'
            </script>";
        }
        else{
            echo "
            <script>
                alert('Data Gagal Ditambahkan ! ');
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
    <title>Tambah Data</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <div class="up-box">
                <h1>Tambah Data</h1>
                <a href="../index.html"><img class="icon" src="../img/x_icon.png" alt="x-icon"></a>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="field input">
                    <label for="nama">Nama Barang</label>
                    <input type="text" name="nama" class="textfield" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="merk">Merk</label>
                    <input type="text" name="merk" class="textfield" autocomplete="off" required>
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
                        <input type="number" name="harga" class="textfield" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="stok">Stok</label>
                    <input type="number" name="stok" class="textfield" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" class="textfield" autocomplete="off" required>
                </div>
                <div class="field">
                    <input class="btn" type="submit" name="tambah" value="Tambah Data">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<section>
    