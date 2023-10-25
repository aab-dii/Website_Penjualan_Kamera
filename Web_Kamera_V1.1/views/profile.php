<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/profile.css">
    <title>Profile</title>
</head>
<body>
    <header>
        <nav class="container-navbar">
            <div class="nav-items">
                <div class="nav-upper">
                    <div class="navbar-content">
                        <a id="home" href="#">Home</a>
                        <a class="me" href="about.html">About Me</a>
                        <a class="profile-btn" href=""><h4><img src="../img/profile.png" alt=""> <?php echo $_SESSION['user_name'] ?></h4></a>
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
        <h1>Profile</h1>
        <div class="container">
            <div class="container-side-nav-content">
                <div class="wrap-side-nav">
                    <a href=""><div class="side-nav">Data diri</div></a>
                    <a href=""><div class="side-nav">Daftar Alamat</div></a>
                    <a href=""><div class="side-nav">Pembayaran</div></a>
                </div>
            </div>
            <div class="profile">
                <div class="wrap-profile">
                    <div class="img-profile">
                        <div class="img"><img src="../img/kamera.jpg" alt=""></div>
                    </div>
                    <div class="info-profile">
                        <div class="header">
                        <h4>Username</h4>
                        </div>
                        <h4>:</h4>
                        <div class="data">
                            <p><?php echo $_SESSION['user_name'] ?></p>
                        </div>
                    </div>
                    <div class="info-profile">
                        <div class="header">
                            <h4>Email</h4>
                        </div>
                        <h4>:</h4>
                        <div class="data">
                            <p><?php  echo $_SESSION['email'] ?></p>
                        </div>
                    </div>
                    <div class="info-profile">
                        <div class="header">
                            <h4>Nomor Hp</h4>
                        </div>
                        <h4>:</h4>
                        <div class="data">
                            <p><?php echo $_SESSION['nomor_hp'] ?></p>
                        </div>
                    </div>
                    <a href="" class="btn">Edit Profile</a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>