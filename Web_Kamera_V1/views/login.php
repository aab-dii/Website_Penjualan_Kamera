<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['username']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $number = $_POST['number'];
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:dashboard.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['email'] = $row['email'];
         $_SESSION['password'] = $row['password'];
         $_SESSION['nomor_hp'] = $row['nomor_hp'];
         header('location:profile.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <section>
        <div class="container">
            <div class="box form-box">
                <div class="up-box">
                    <h1>Login</h1>
                    <a href="product.html"><img class="icon" src="../img/x_icon.png" alt="x-icon"></a>
                </div>
                <form action="" method="post">
                    <div class="field input">
                        <label for="username">email</label>
                        <input type="email" name="email" id="username" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>
                    <a href="">Forgot your password?</a>
                    <div class="field">
                        <input class="btn" type="submit" name="submit" value="Login">
                    </div>
                    <div class="links">
                        Don't have account? <a href="register.php">Sign Up now</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>

