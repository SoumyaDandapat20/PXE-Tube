<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
  
   $select = mysqli_query($conn, "SELECT * FROM `userss` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'User Already Exist'; 
   }else{
      if($pass != $cpass){
         $message[] = 'Confirm Password NOT Matched!';
        }
      }
   }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to PXETube</title>
    <link rel="stylesheet" href="assets/CSS/style.css">
</head>
<body>
    <div class="signUpContainer">

        <form action="" method="post">
            <img src="assets/images/logo.png" alt="logo" class="logo">
            <h3>Sign Up</h3>  <span>to continue</span><br>
            <?php
                if(isset($message)){
                    foreach($message as $message){
                        echo '<div class="error-msg">'.$message.'</div>';
                    }
                }
            ?>

        <input type="text" name="name" placeholder="Username" class="box" required>
        <input type="email" name="email" placeholder="Email" class="box" required>
        <input type="password" name="password" placeholder="Password" class="box" required>
        <input type="password" name="cpassword" placeholder="Confirm Password" class="box" required>
        <input type="submit" name="submit" value="SUBMIT" class="btn">
            <h2> Already have an account?  <a href="login.php" id="signInMessage"> Log In </a> here</h2>
        </form>
        
</body>
</html> 
