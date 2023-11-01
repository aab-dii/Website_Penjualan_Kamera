<?php

@include 'config.php';

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

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password,nomor_hp, user_type) VALUES('$name','$email','$pass','$number','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <section>
        <div class="container">
            <div class="box form-box">
                <div class="up-box">
                    <h1>Sign Up</h1>
                    <a href="product.html"><img class="icon" src="../img/x_icon.png" alt="x-icon"></a>
                </div>
                <?php
                    if(isset($error)){
                        foreach($error as $error){
                            echo '<span class="error-msg">'.$error.'</span>';
                        };
                    };
                    ?>
                <form action="" method="post">
                    <div class="field input">
                        <label for="username">Username</label >
                        <input type="text" name="username" id="username" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="password">Confirm Password</label>
                        <input type="password" name="cpassword" id="password" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="number">Nomor HP</label>
                        <input type="number" name="number" id="number" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="user_type">User Type</label>
                        <select name="user_type">
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                        </select>
                    </div>
                    <div class="field">
                        <input class="btn" type="submit" name="submit" value="Sign Up">
                    </div>
                    <div class="links">
                        Have account? <a href="login.php">Login now</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>