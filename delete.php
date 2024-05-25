<?php 
    include('config.php');

    if (isset($_GET['id'])) {
        
        $id = $_GET['id'];
        $res = mysqli_query($conn,"SELECT * FROM upload where id = $id");
        if($row = mysqli_fetch_array($res)){
            $del = $row['name'];
        }
        unlink($file_dest.$del);
        $result = mysqli_query($conn,"DELETE FROM upload WHERE id = $id ");
        if($result){
            header("location: your_videos.php");
        }
        else{
            echo 'Something went wrong';
        }

    }
?>




