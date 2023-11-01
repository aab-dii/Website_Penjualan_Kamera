<?php
include 'config.php'; 

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login.php');
}


$query = "SELECT * FROM barang_form";
$result = mysqli_query($conn2, $query);
$barang = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Kamera</title>
    <link rel="stylesheet" href="../style/product.css">
</head>
<body>
    <nav class="container-navbar">
        <div class="nav-items">
            <div class="nav-upper">
                <div class="navbar-content">
                <p>Hari ini <?php date_default_timezone_set("Asia/Makassar"); echo date("h:i:sa, l, d M Y"); ?></p>
                    <a id="home" href="user.php">Home</a>
                    <a class="me" href="about.html">About Me</a>
                    <a class="profile-btn" href="profile.php"><h4><img src="../img/profile.png" alt=""> <?php echo $_SESSION['user_name'] ?></h4></a>
                    <a class="me" href="logout.php">Log Out</a>
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

    <section>
        <div class="container-content">
            <div class="section-content1">
                <div class="main-content1">
                    <h2 class="judul">Produk Terbaru !!!</h2>
                    <div class="wrap-content1">
                        <?php foreach ($barang as $brg) : ?>
                            <a href="cart.php?id=<?php echo $brg['id']; ?>" class="content1-items1">
                                <img class="img-content1" src="../assets/<?php echo $brg['gambar']; ?>" alt="" width="100%">
                                <h4 class="product"><?php echo $brg['nama']; ?></h4><br>
                                <h4 class="harga1">Rp <?php echo $brg['harga']; ?></h4>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="section-content2">
                <div class="main1-content2">
                    <h2 class="judul1">Produk Pilihan Kami !!!</h2>
                    <div class="box1"></div>
                    <div class="wrap1-content2">
                        <?php foreach ($barang as $brg) : ?>
                            <a href="cart.php?id=<?php echo $brg['id']; ?>" class="content-items2">
                                <img class="img-content2" src="../assets/<?php echo $brg['gambar']; ?>" alt="">
                                <h4 class="product"><?php echo $brg['nama']; ?></h4><br>
                                <h4 class="harga2">Rp <?php echo $brg['harga']; ?></h4>
                                </a>
                            <?php endforeach; ?>
                    </div>
                    
                </div> 
                <div class="main2-content2">
                    <h2 class="judul">Produk Pilihan Kami !!!</h2>
                    <div class="wrap2-content2">
                        <?php foreach ($barang as $brg) : ?>
                            <a href="cart.php?id=<?php echo $brg['id']; ?>" class="content-items2">
                            <img class="img-content2" src="../assets/<?php echo $brg['gambar']; ?>" alt="">
                            <h4 class="product"><?php echo $brg['nama']; ?></h4><br>
                            <h4 class="harga2">Rp <?php echo $brg['harga']; ?></h4>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <div class="box2"></div>
                </div>
            </div>
        </div> 
        <div class="section-content3">
            <div class="main-content3">
                <a href="" class="more"><p>More</p></a>
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