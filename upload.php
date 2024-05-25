<?php 
    include("config.php");

    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $file_name = $_FILES['file']['name'];
        $file_type = $_FILES['file']['type'];
        $temp = $_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        $file_dest = "upload/".$file_name;

        if(move_uploaded_file($temp,$file_dest)){
            
            $query = "INSERT INTO upload (name,title) VALUES ('$file_name','$title')";

            if(mysqli_query($conn,$query)){
                $success = "Video Uploaded succesfully";
            }
            else{
                $failed = "Failed to load";
            }
        }    
        else{
            $msz = "Please choose a video to upload ! ";
        }
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PXETube|Upload</title>
    
    <!-- custom stylesheet -->
    <link rel="stylesheet" href="assets/CSS/stylehome.css">
    <link rel="stylesheet" href="assets/CSS/styleupld.css">
    <link rel="stylesheet" href="assets/CSS/style.css">

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


    <div class="upld" >
        <form action="" method="post" enctype="multipart/form-data" >
            <h3>Upload your video here</h3> <br>
            <input type="file" name="file"  class="box" >
            <input type="text" name="title" placeholder="Add title here" class="box" required>
            <?php
                if(isset($success)){
            ?>
            <div class="message">
                <?php echo $success; ?>
            </div>
            <?php } ?>

            <?php if(isset($failed)){ ?>        
            <div class="error-msg">
                <?php echo $failed; ?>
            </div>
            <?php }?>

            <?php if(isset($msz)){ ?>        
            <div class="error-msg">
                <?php echo $msz; ?>
            </div>
            <?php }?>

            <input type="submit" name="submit" value="UPLOAD" class="btn">


        </form>
    </div>

    <script src="assets/JS/script.js"></script>
</body>
</html>