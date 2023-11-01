<!-- <?php
@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login.php');
}

$result = mysqli_query($conn2, "SELECT * FROM barang_form");

$barang = [];

while ($row = mysqli_fetch_assoc($result)){
    $barang [] = $row;
}


?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/dashboard.css">
    <title>Admin Page</title>
</head>
<body>
    <header>
        <nav>
            <div class="container-navbar">
                <div class="nav-items">
                    <h1>Admin <span><?php echo $_SESSION['admin_name'] ?></span></h1>
                    <a href="login.php">Log Out</a>
                </div>
            </div>
        </nav>
    </header>
    <section>
        <div class="container-content">
            <button class="add-button"><a href="tambah.php">Tambah</a></button>
            <div class="wrap">
                <div class="main-content-lihat">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Merk</th>
                                <th>Jenis</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach($barang as $brg): ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $brg["nama"]; ?></td>
                                    <td><?php echo $brg["merk"]; ?></td>
                                    <td><?php echo $brg["jenis"]; ?></td>
                                    <td><?php echo $brg["harga"]; ?></td>
                                    <td><?php echo $brg["stok"]; ?></td>
                                    <td><img src="../assets/<?php echo $brg["gambar"] ?>" alt="" width="100px"height="100px"></td>
                                    <td class="action">
                                        <button class="edit-btn"><a href="edit.php?id=<?php echo $brg['id']; ?>">Update</a></button>
                                        <button class="delete-btn"><a href="hapus.php?id=<?php echo $brg['id']; ?>">Delete</a></button>
                                    </td>
                                </tr>
                                <?php $i++; endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>
</html>


<!-- <h1>Tambah Data</h1>
                <div class="wrap">
                    <form action="" method="post">
                        <div class="field input">
                            <label for="namabarang">Nama Barang</label>
                            <input type="text" name="nama_barang" id="nama_barang>
                        </div>
                        <div class="field input">
                            <label for="username">email</label>
                            <input type="email" name="email" id="username">
                        </div>
                        <div class="field input">
                            <label for="username">email</label>
                            <input type="email" name="email" id="username">
                        </div>
                        <div class="field input">
                            <label for="username">email</label>
                            <input type="email" name="email" id="username">
                        </form>
                        </div> -->
                <!-- </div> -->