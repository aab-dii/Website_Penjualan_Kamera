<?php
if (isset($_GET['id'])) {
    $id_barang = $_GET['id'];
} else {
    echo "ID barang tidak ditemukan.";
    exit; 
}

include 'config.php'; 

$sql = "SELECT * FROM barang_form WHERE id = $id_barang";
$result = mysqli_query($conn2, $sql);

if (mysqli_num_rows($result) > 0) {
    $barang = mysqli_fetch_assoc($result);
} else {
    // Tindakan jika barang dengan ID tertentu tidak ditemukan
    echo "Barang dengan ID $id_barang tidak ditemukan.";
    exit; 
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/cart.css">
    <title>Product</title>
</head>
<body>
    <header>
        <nav class="container-navbar">
            <div class="nav-items">
                <div class="nav-upper">
                    <div class="navbar-content">
                        <a id="home" href="index.html">Home</a>
                        <a class="me" href="about.html">About Me</a>
                        <a class="masuk" href="login.php"><h3>Masuk</h3></a>
                        <a class="daftar" href="register.php"><h3>Daftar</h3></a>
                        <img src="../img/moon.png" id="icon">
                    </div>
                </div>
                <div class="nav-lower">
                    <img class="logo" src="../img/logo.png">
                    <div class="search-box">
                        <svg class="unf-icon" viewBox="0 0 24 24" width="24" height="24" fill="var(--NN500, #8D96AA)" style="display:inline-block;vertical-align:middle;flex:0 0 24px"><path d="M20.53 19.46l-4.4-4.4a7.33 7.33 0 10-1.07 1.06l4.41 4.41a.77.77 0 001.06 0 .77.77 0 000-1.07zm-15.78-9a5.75 5.75 0 115.75 5.75 5.76 5.76 0 01-5.75-5.72v-.03z"></path></svg>
                        <form action="">
                            <div class="input">
                                <input type="text" name="search" placeholder="Cari di Toko Kamera">
                            </div>
                        </form>
                    </div>
                    <img id="cart" src="../img/cart.png" alt="">
                </div>
            </div>
        </nav>
    </header>
    <section>
        <div class="container-content">
            <div class="main-content">
                <div class="product-content">
                    <div class="img-content"><img class="img-content2" src="../assets/<?php echo $barang['gambar']; ?>" alt=""></div>
                    <div class="rincian-content">
                        <div class="wrap1">
                        <h1><?php echo $barang['nama']; ?></h1>
                        <h4>Harga: Rp <?php echo $barang['harga']; ?></h4>
                        <h4>Stok : <?php echo $barang['stok']; ?></h4>
                        </div>
                        <div class="wrap2">
                            <h1>100 Produk Terjual</h1>
                        </div>
                    </div>
                    <hr>
                    <a href="">Whistlist</a>
                    <a href="">Share</a>
                </div>
                <div class="cart-content">
                    <div class="content2">
                        <h1>Beli</h1>
                        <div class="qty-content">
                            <form action="">
                                <input type="number" name="qty" id="qty">
                            </form>
                            <p>Jumlah</p>
                        </div>
                        <a href="">Keranjang</a>
                        <a href="">Beli</a>
                        <hr>
                    </div>
                </div>
            </div>
                <div class="detail-content">
                    <h1>Detail Kamera</h1>
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit consequuntur praesentium quisquam fuga voluptates mollitia ipsam error quam minus a illum placeat nihil ipsum eius cupiditate est, libero omnis! Sapiente!</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit consequuntur praesentium quisquam fuga voluptates mollitia ipsam error quam minus a illum placeat nihil ipsum eius cupiditate est, libero omnis! Sapiente!</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit consequuntur praesentium quisquam fuga voluptates mollitia ipsam error quam minus a illum placeat nihil ipsum eius cupiditate est, libero omnis! Sapiente!</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit consequuntur praesentium quisquam fuga voluptates mollitia ipsam error quam minus a illum placeat nihil ipsum eius cupiditate est, libero omnis! Sapiente!</p>
                    </div>
                </div>
                <div class="comment-content">
                    <h1>Ulasan Pembeli</h1>
                    <div class="comment-section">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit consequuntur praesentium quisquam fuga voluptates mollitia ipsam error quam minus a illum placeat nihil ipsum eius cupiditate est, libero omnis! Sapiente!</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit consequuntur praesentium quisquam fuga voluptates mollitia ipsam error quam minus a illum placeat nihil ipsum eius cupiditate est, libero omnis! Sapiente!</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit consequuntur praesentium quisquam fuga voluptates mollitia ipsam error quam minus a illum placeat nihil ipsum eius cupiditate est, libero omnis! Sapiente!</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit consequuntur praesentium quisquam fuga voluptates mollitia ipsam error quam minus a illum placeat nihil ipsum eius cupiditate est, libero omnis! Sapiente!</p>
                    </div>
                </div>
           
        </div>
    </section>
    <footer>
        <div class="container-footer">
            <div class="content-footer">
                <div class="footer-header">
                    <h4>Ikuti Saya</h4>
                </div>
                <div class="footer-items">
                    <a href="https://www.instagram.com/abdi.kazu/" class="sosmed"><img src="../img/ig.png" alt=""></a>
                    <a href="https://www.facebook.com/profile.php?id=100065862683504" class="sosmed"><img src="../img/fb.png" alt=""></a>
                </div>
            </div>
        </div>
    </footer>
    <script src="../script/product.js"></script>
</body>
</html>