<?php 
    include ('config.php');
    
    $_SESSION["id"] = 1;
    $sessionId = $_SESSION["id"];
    $user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM profile WHERE id=$sessionId"));    
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PXETube|Profile</title>
    
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
    <div class="contact">
        <h3 >Your Profile!</h3>
    </div>        
    
    <div class="row">
        <form class="form" id="form" action="" enctype="multipart/form-data" method="post">   
            <div class="upload">
                <?php
                    $id = $user["id"];
                    $name = $user["name"];
                    $image = $user['image'];
                ?>
                <img src="profile/<?php echo $image; ?>"  title="<?php echo $image; ?>" style="width: 380px;
    height: 380px;" >
                
                <div class="round">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="name" value="<?php echo $name; ?>">
                    <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png">
                    <i class="fa fa-camera cam" ></i>
 
                </div>
            </div>
        </form> 

        <!-- <div class="card">
            <table class="table" style="margin-left: 40%;" > 
                <tr>
                    <th>Username</th>
                    <td>
                        $Username$ 
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>
                        $email$ 
                    </td>
                </tr>
                <tr>
                    <th>Joined on</th>
                    <td>
                        $signupdate$   
                    </td>
                </tr>

            </table>
        </div> -->

    </div>    


    <script>
        document.getElementById("image").onchange = function(){
            document.getElementById('form').submit();
        }
    </script>
    
    <?php 
        if (isset($_FILES['image']['name'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];

            $imageName = $_FILES['image']['name'];
            $imageSize = $_FILES['image']['size'];
            $tmpName = $_FILES['image']['tmp_name'];

            $validImageExtension = ['jpg','jpeg','png'];
            $imageExtension = explode('.',$imageName);
            $imageExtension = strtolower(end($imageExtension));
            if(!in_array($imageExtension,$validImageExtension)){
                echo "
                
                <script>
                    alret('Invalid Image Extension');
                    document.location.href = '../PXETube/profile.php';
                </script>

                " ;
            }
            elseif ($imageSize > 12000000) {
                echo "
                    <script>
                        alert('Image Size is too Large');
                        document.location.href = '../PXETube/profile.php';
                    </script>
                ";
            }
            else {
                $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa");
                $newImageName .= "." . $imageExtension;
                $query = "UPDATE profile SET image = '$newImageName' WHERE id = $id ";
                mysqli_query($conn, $query);
                move_uploaded_file($tmpName, 'profile/'.$newImageName);
                echo "
                    <script> 
                        document.location.href = '../PXETube/profile.php';
                    </script>
                
                ";
            }
        }
    ?>


    <script src="assets/JS/script.js"></script>
</body>
</html>