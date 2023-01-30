<html>
    <head>
        <link href="css/window.css" type="text/css" rel="stylesheet">
        <title>Admin</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script>
                            function valUser(){
                            var user=document.getElementById("user").value;
                            var pass1=document.getElementById("passw1").value;
                            var pass2=document.getElementById("passw2").value;
                            
                            
                            if(user==""){
                                alert("Please enter User Name");
                                return false;
                            }
                            if(pass1==""){
                                alert("Please enter Password");
                                return false;
                            }
                            if(pass2==""){
                                alert("Please re-enter Password");
                                return false;
                            }
                                
                            if(pass1!=pass2){
                                alert("Password you entered is not matching");
                                return false;
                            }
                            
                            }
                            function checkuser(){
                                var del=document.getElementById("usriddel").value;
                                if(del==""){
                                alert("Please Enter User ID");
                                return false;
                            }
                            }
                        </script>
    </head>
    <body class="background">
        
        <script src="jquery.tabledit.min.js"></script> 
        <script src="jQuery-3.4.1.min.js"></script> 
        
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <!--<font class="font1"><a href="" class="navbar-brand">Welcome Admin</a></font>-->
             <font class= "font1"><a href="" class="navbar-brand"><img src="images/mis.jpg" height="30px"></a></font>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="adminWindow.php" class="nav-link" ><div class="img"><img src="images/home2.png" width="30" height="30" alt="" style="padding-bottom:7px;padding-top:1px;">Dashboard</div></a></li>
                    <li class="nav-item"><a href="" class="nav-link active">Users</a></li>
                    <li class="nav-item"><a href="adminStudents.php" class="nav-link">Students</a></li>
                    <li class="nav-item"><a href="adminLecture.php" class="nav-link">Lectures</a></li>
                    <li class="nav-item"><a href="adminSubject.php" class="nav-link">Subjects</a></li>
                    <li class="nav-item"><a href="adminNotice.php" class="nav-link">Notices</a></li>
                    
                </ul>
                
            </div>
             <div>
                 <ul class="nav navbar-nav navbar-right">                    
                        <button class="button1"><li class="nav-item">
                        <?php
                            session_start();
                            
                            if($_SESSION['user']){
                                
                            }else{
                                header("location:login.php");
                            }
                            
                            ?>
                        <a href="logout.php" class="nav-link">logout</a>
                        </li></button>
                </ul> 
                 
            </div>
        </nav>
        
        
    <div class="container">
       <!-- <div class="table-responsive">  -->
        <?php
            
                //
          echo "<link href='css/myCSS.css' type='text/css' rel='stylesheet'>";  
        echo "<style>
                
                
                .fmuser2{
                    width:450px;
                }
            </style>";
        ?>
        
            <table class='tbl1'>
                <thead>
                    <tr class='trtop'>
                        <th id='th1'>User ID</th>
                        <th id='th1'>Password</th>
                        <th id='th1'>Post</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                        include_once('phpConnect.php');
                        $queryusers="select *from users";
                        $result=mysqli_query($connection,$queryusers);
                        while($rows=mysqli_fetch_array($result)){
                            echo "<tr id='tr1'>";
                            echo "<td>";
                            echo $rows['user_name'];
                            echo "</td>";
                            echo "<td>";
                            echo $rows['password'];
                            echo "</td>";
                            echo "<td>";
                            echo $rows['post'];
                            echo "</td>";
                            
                            echo "</tr>";
                            
                        }
                       
                        ?>
       
                        </tbody>
                    </table>
         </div>
                    
            <div class="container"> 
                
                
                
            <div class="row">    
                  <div class="col-sm-6">
                       
                        <form method='post' action='' class='fmuser' id="adduser" onsubmit="valUser()">
                         <h2>Create New User</h2>   
                        <table border='0' class="tbl2">
                        <div class='input-group'>
                        <tr id='tr2'>
                            <td>
                                <label>User ID</label>
                            </td>
                            <td>
                                <input type='text' name='userName' placeholder='Enter User ID' id="user">
                            </td>
                        </tr>
                        </div>
                        <div class='input-group'>
                        <tr id='tr2'>
                            <td>
                                <label>Password</label>
                            </td>
                            
                            <td>
                                <input id='passw1' type='password' name='passw1' >
                            </td>
                               
                        </tr>
                        </div>
                        <div class='input-group'>
                        <tr id='tr2'>
                            <td>
                                <label>Password</label>
                            </td>
                            <td>
                                <input type='password' name='passw2' id="passw2">
                            </td>
                        </tr>
                        </div>
                        <div class='input-group'>
                        <tr id='tr2'>
                            <td>
                                <label>Post</label>
                            </td>
                            <td>
                                <select name='post' style='width:180px;'>
                                    <option  value='student' selected>Student</option>
                                    <option  value='lecture'>Lecture</option>
                                    <option  value='general'>Other</option>
                                </select> 
                            </td>
                        </tr>
                        </div>
                        <div class='input-group'>
                        <tr id='btnrow'>
                            
                            
                            <td id='td1' >
                                <button type='submit' name='update' class='btn' >Update</button> 
                            </td>
                            
                            <td id='td1'>
                               <center> <button type='submit' name='saved' class='btn'>Save</button> </center>
                            </td>
                           
                           
                        </tr>
                        <tr>
                            <td colspan='2'>
                               <center> <button type='reset' name='deletesub' class='btn'>Clear</button> </center>
                            </td>
                        </tr>    
                            </div>
                        </table>
                        </form>
                        </div>
                
                
                    <div class="col-sm-6">
                    <form method='post' action='' class='fmuser2' onsubmit="checkuser()">
                        <h2>Delete User</h2>   
                        <table border='0' class="tbl2">
                        <div class='input-group'>
                        <tr id='tr2'>
                            <td>
                                <label>User ID</label>
                            </td>
                            <td style="padding-left:30px;">
                                <input type='text' name='userName' placeholder='Enter User ID' id="usriddel">
                            </td>
                        </tr>
                            <tr>
                                 <td id='td2'>
                               <center> <button type='submit' name='delete' class='btn' style="background:red;">Delete</button> </center>
                            </td>
                            
                            <td  id='td2'>
                               <center> <button type='reset' name='deletesub' class='btn'>Clear</button> </center>
                            </td>
                       
                            </tr>
                        </div>
                        </table>
                    </form>
                        
                    </div>
                </div>
        </div>
       
                    <?php
                    $edit_state = false;
                    if(isset($_POST['saved'])){
                        
                        $un=$_POST['userName'];
                        
                        $post=$_POST['post'];
                        $pass;
                        if($_POST['passw1']==$_POST['passw2']){
                            $pass=$_POST['passw1'];
                            $queryinsert="insert into users values('$un','$pass','$post')";
                            $re=mysqli_query($connection,$queryinsert);
                            if($re==1){
                                echo "<script>alert('User Created Successfully');</script>";
                                echo "<script>window.location.assign('adminUsers.php');</script>";
                            }
                        }else{
                            
                            echo "<script>alert('Cannot Create the User');</script>";
                            echo "<script>window.location.assign('adminUsers.php');</script>";
                        }
                    }
                    if(isset($_POST['update'])){
                        $un=$_POST['userName'];
                        
                        $post=$_POST['post'];
                        $pass;
                        if($_POST['passw1']==$_POST['passw2']){
                            $pass=$_POST['passw1'];
                            $queryinsert="update users set password='$pass', post='$post' where user_name='$un'";
                            mysqli_query($connection,$queryinsert);
                           echo "<script>alert('The User Updated Successfullty');</script>";
                           echo "<script>window.location.assign('adminUsers.php');</script>"; 
                        }else{
                            echo "<script>alert('Cannot Update the User');</script>";
                            echo "<script>window.location.assign('adminUsers.php');</script>";
                        }
                    }
                    if(isset($_POST['delete'])){
                        $un=$_POST['userName'];
                        
                       
                            $querydel="delete from users where user_name='$un'";
                            mysqli_query($connection,$querydel);
                            echo "<script>alert('The User Deleted Successfully');</script>";
                            echo "<script>window.location.assign('adminUsers.php');</script>";
                        }else{
                           
                           
                        }
                    
                    ?>
            
       
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    </body>
    <footer class='f'>
        <div class='footer'  style="background-color:rgba(0,0,0, 0.4);height:auto;">
            <p class="fp" style='font-family: pristina;font-size:20px; margin-top:5px;margin-bottom:5px; font-weight: bold;'>Student Management System All rights recived</p>
        </div>
    </footer>
</html>
