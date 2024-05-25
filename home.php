<?php

include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PXETube|Home</title>
    
    <!-- custom stylesheet -->
    <link rel="stylesheet" href="assets/CSS/style.css">
    <link rel="stylesheet" href="assets/CSS/stylehome.css">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   

</head>
<body>

    
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn " onclick="closeNav()">&times;</a>
        <br><br><br>
        <a href="home.php" class="links">
            <i class="icon fa-solid fa-house"></i>Home</a>
        <a href="your_videos.php" class="links">
            <i class="icon fa-solid fa-tv"></i>Your Videos</a>
        <a href="#" class="links">
            <i class="icon fa-solid fa-gear"></i>Settings</a>
        <a href="about.php" class="links">
            <i class="icon fa-solid fa-circle-info"></i>About</a>
        <a href="home.php?logout=<?php echo $user_id; ?>" 
                class="links">
            <i class="icon fa-solid fa-power-off"></i>LogOut</a>
    </div>

    <nav class="navbar">
        <div class="menu">
            <span onclick="openNav()"><i class="fa-solid fa-bars"></i></span>
        </div>

        <a href="home.php"><img src="assets/images/logo.png" alt="logo" class="logo"></a>
        
        <div class="search-box">
            <input type="text" class="searchbar" name="search" placeholder="Search" id="">       
            <i class="fa-solid fa-magnifying-glass search"></i>
        </div>
        
        <div class="user-optn">
           <a href="upload.php"><i class="fa-solid fa-video video"></i></a>
          
            <a href="profile.php"> <i class="fa-solid fa-circle-user user"></i></a>
        </div>
    </nav>

    <marquee behavior="scroll" direction="left" style="font-size: 2.5rem; font-style: italic; ">
        Welcome <!--Username--> to PXETube!
    </marquee>

    <div class="video-container" id="main">
            <?php
                $qry = 'SELECT * FROM upload';

                $query = mysqli_query($conn,$qry);

                while($row = mysqli_fetch_array($query)){
            ?>   
                <div class="myVdo">
                    <video id="myVdo" width="300px" height="200px" controls>
                        <source src="<?php echo 'upload/'.$row['name']; ?>">
                    </video>
                    <h3 class="title"><?php echo $row['title'] ; ?></h3>
                </div>        
            <?php } ?>

    </div>
    


    <script src="assets/JS/script.js"></script>
</body>
</html>