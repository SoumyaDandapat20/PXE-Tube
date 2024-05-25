<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

    $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if(mysqli_num_rows($select) > 0){
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row['id'];
        header('location:home.php');
    }else{
        $message[] = 'Incorrect Email or Password!';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to PXETube|Login</title>
    <link rel="stylesheet" href="assets/CSS/style.css">
</head>
<body>
    <div class="signUpContainer">
         <form action="" method="post" >
            <img src="assets/images/logo.png" alt="logo" class="logo">
            <h3>Login Now</h3>  <span>to continue</span><br>
            <?php
                if(isset($message)){
                    foreach($message as $message){
                        echo '<div class="error-msg">'.$message.'</div>';
                    }
                }
            ?>
            <input type="email" name="email" placeholder="Email" class="box" required>

            <input type="password" name="password" placeholder="Password" class="box" required>
            
            <input type="submit" name="submit" value="LOG IN" class="btn">

            <h2> Don't have an account?  <a href="signup.php" id="signInMessage"> Sign Up </a> here</h2>
        </form>
        
    </div>
</body>
</html> 