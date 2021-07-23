<?php
$db=mysqli_connect("localhost","root","","motu");
$user=$_POST['user'];
$pass=$_POST['pass'];
$sql = "INSERT INTO users(user,pass) VALUES ('$user', '$pass')";
        $query = mysqli_query($db, $sql);
        if($query){
            /*$query = mysqli_query($conn, "SELECT user_id FROM users WHERE user_email = '$useremail'");
            $row = mysqli_fetch_assoc($query);
            $_SESSION['user_id'] = $row['user_id'];
            header("location:home.php");
            */
            echo "registered";
            sleep(3);
             
        }
?>
