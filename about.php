
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PXETube|About</title>
    
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
    


    <div class="about" id="main">
        <img src="assets/thumbnails/wallpaper.png" alt="">
        <div class="topic" id="main" >   
            <h1 > About Us</h1>
        </div>
        
        <p class="content" >
            The Proof and Experimental Establishment (PXE) is responsible for design and developmental trials of guns, mortars, rockets, RCL, tank guns and their ammunition, including Naval guns and ammunition. PXE also conducts performance evaluation trials for tank armour and ammunition, as well as proof of armour plates, tank turrets, ICVs, proximity fuzes. <br>

            Proof & Experimental Establishment is situated on the coast of Bay of Bengal at Chandipur, in Odisha, at a distance of 15 km from Balasore city. This is the oldest establishment of DRDO. It was established by a Government Order of May 30, 1895. The first firing activity took place on 07 Nov 1895. A handful of personalities played a key role in getting the sanction. Notable among them are Capt RH Mahon, Lt Col R Wace and Maj Gen A Walker. The establishment started functioning sometime in 1896 with Capt RT Moore, R.A., as the first Proof Officer. With this new setup, the quality assurance was separated from the production of armament stores which is the norm everywhere. Since then, it has had a panoramic growth, especially after it was brought under the aegis of DRDO in the year 1958. Today it is internationally acclaimed Proof Range with state-of-the-art facilities for test and evaluation of conventional Armaments.<br>

            The appointment of the Head of the establishment was then Proof Officer. Subsequently, it was changed to Proof & Experimental Officer (PEO), Superintendent (SPE), Commandant (CPX) from 1971, Director & Commandant (DCPX) from 1996 and now as Director since May 2003. The name of the establishment also underwent a change from the Proof Department in India to Proof & Experimental Establishment.<br>

            For the last nearly 125 years the establishment has grown from strength to strength. Chandipur sea beach provides a natural ideal location for a proof range. It is crescent-shaped coastline running towards South-West, which facilitates firing into the sea without affecting human habitation, but the trajectory never very far from the coast to make an observation of projectile behaviour difficult.
        </p>

    </div>

    <script src="assets/JS/script.js"></script>
</body>
</html>