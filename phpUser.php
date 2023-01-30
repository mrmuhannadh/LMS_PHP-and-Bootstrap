<?php 
session_start();
require('phpConnect.php');
if (isset($_POST['user']) and isset($_POST['password'])){
$username = $_POST['user'];
$password = $_POST['password'];
$query = "SELECT * FROM `users` WHERE user_name='$username' and password='$password'";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
if ($count != 1){
    echo "<script>alert('User Name and Password Not Matching')</script>";
    echo "<script>window.location.assign('login.php');</script>";
    //header("location:login.php?error=1");      
    
                    
}else{
         //$_SESSION['user'] = $username;
        $querypost = "select post from users where user_name='$username'";
        $result1=mysqli_query($connection,$querypost);
        //$post='admin';
        while($rows=mysqli_fetch_assoc($result1)){
            $post=$rows['post'];   
        
       switch($post){
            case 'admin':
               $_SESSION['user'] = $username;
               $_SESSION['password'] = $password;
               echo "<script>window.location.assign('adminWindow.php');</script>";
               die;
               break;
           case 'student':
               $_SESSION['user'] = $username;
               $_SESSION['password'] = $password;
               echo "<script>window.location.assign('studentWindow.php');</script>";
               die;
               break;
           case 'lecture':
               $_SESSION['user'] = $username;
               $_SESSION['password'] = $password;
               echo "<script>window.location.assign('lectureWindow.php');</script>";
               die;
               break;
           /*case 'TG100':
               $_SESSION['user'] = $username;
               $_SESSION['password'] = $password;
               echo "<script>window.location.assign('studentWindow.php');</script>";
               die;
               break;
           case 'TG101':
               $_SESSION['user'] = $username;
               $_SESSION['password'] = $password;
               echo "<script>window.location.assign('studentWindow.php');</script>";
               die;
               break;
           case 'TG102':
               $_SESSION['user'] = $username;
               $_SESSION['password'] = $password;
               echo "<script>window.location.assign('studentWindow.php');</script>";
               die;
               break;*/
       } 
        }
}
}

?>