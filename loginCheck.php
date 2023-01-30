<?php
    $host="localhost";
    $user="root";
    $password="";
    $database="php";
    mysqli_connect($host,$user,$password,$database);
    //mysqli_select_db($database);
    
    if(isset($_POST['username'])){
        $usname=$_POST['user'];
        $pw=$_POST['password'];
        
        $sql="select user_name,password from users where user_name='".$usname."' AND password='".$pw."' limit 1";
        
        $result=mysql_query($sql);
        if(mysql_num_rows($result)==1){
            echo "You have successfully logged in";
            exit();
        }else{
            echo "You are not logged in";
        }
    }
?>