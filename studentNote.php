<html>
    <head>
        <link href="css/window.css" type="text/css" rel="stylesheet">
        <title>Student</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="jQuery-3.4.1.min.js"></script>
        
    </head>
    <body class="background">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <font class= "font1"><a href="" class="navbar-brand"><img src="images/mis.jpg" height="30px"></a></font>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="studentWindow.php" class="nav-link">Dashboard</a></li>
                    <li class="nav-item"><a a href="" class="nav-item nav-link active" >Subject</a></li>
                    <li class="nav-item"><a href="Marks.php" class="nav-link">Marks</a></li>
                    <li class="nav-item"><a href="studentAttendence.php" class="nav-link">Attendence</a></li>
                    <li class="nav-item"><a href="studentMessage.php" class="nav-link">Messages</a></li>
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
        <div class="container-fluid">    
            <div class="row">
                <div class="col-sm-9 col-md-6 col-lg-8">
                    <marquee style="border-bottom-style:inset;border-top-style:inset;color:#fff;">Welcome to Student Management System</marquee>  
                                    
                    <div class="container">
       <!-- <div class="table-responsive">  -->
        <?php
            
                //
            
        echo "<style>
                .tbody1:hover #td1 {
                    color: transparent ;
                    text-shadow: 0 0 5px #fff;
                    
                }

                .tbody1:hover tr:hover #td1 {
                    color: #fff;
                    text-shadow: 0 1px 0 #fff;
                    
                }
                .tbl1{
                    width:100%;
                    margin-top:25;
                    border-collapse: collapse;
                    text-align: center;
                   
                }
                #tr1{
                    border-bottom: none;
                    
                     border-top: none;
                     font-weight:bold;
                     color:white;
                     font-size:30px;
                     text-align:left;
                }
                #tr2{
                    border-top: 1px solid #cbcbcb;
                    
                     border-top: none;
                     font-weight:bold;
                     color:white;
                     font-size:20px;
                     text-align:left;
                }
                #tr3{
                    border-bottom: 1px solid #cbcbcb;
                    
                     border-top: none;
                     font-weight:none;
                     color:white;
                     font-size:20px;
                     text-align:center;
                }
                #th1{
                    color:white;
                }
                th,td{
                    border:none;
                    
                    padding: 5px;
                }
                #td1{
                    padding-left:10px;
                    padding-bottom:50px;
                    height: 120px;
                    
                }
                #td2{
                    padding-left:30px;
                    padding-top:25px;
                    
                }
                 
               
                
                a:link{
                    color: white;
                    text-decoration:none;
                }
                a:visited{
                    color: white;
                    text-decoration:none;
                }
                a:active{
                    color: red;
                    text-decoration:none;
                }
               
               
                
                .tabletwo{
                    display:none;
                }
                          
            </style>";
        ?>
        
            <table class='tbl1'>
                <script>
                            $(document).ready(function(){
                                $('.sub').click(function(){
                                    
                                    $('.tabletwo').toggle();

                                });

                            });
                            
                            </script>
                <thead>
                    <tr>
                        
                        
                          
                    </tr>
                </thead>
                <tbody class='tbody1'>
                    
                    <?php
                        echo "";
                        //session_start();
                        include_once('phpConnect.php');
                        $username =$_SESSION['user'];
                            $query1="select sub_name,sub_id from subject where sub_id in(select sub_id from stusub where st_id='$username')";
                            $result1=mysqli_query($connection,$query1);
                            
                             
                            
                            
                            
                    
                    
                
                      while($rows2=mysqli_fetch_array($result1)){
                           $rowigot=$rows2['sub_id'];
                          
                              echo "<tr id='tr1'  class='sub'>";  
                                
                            echo "<td id='td1' class='subtd'>";
                               echo "<a href='#' class='anotes'> ";  
                                   echo "<p id='pone'>";
                                        echo $rows2['sub_name'];
                                    echo "</p>";
                                    echo "</a>";
                                        
                                            
                                        $query2=" select s.sub_name,n.note_id,n.note from subject s, note n, stusub b where s.sub_id=b.sub_id and b.sub_id=n.sub_id and b.st_id='$username' and s.sub_id='$rowigot' order by s.sub_name";
                            
                                        $result2=mysqli_query($connection,$query2);
                                        while($rows=mysqli_fetch_array($result2)){
                                        echo "<table class='tabletwo'>";
                                        
                                        echo "<tr id='tr2'class='week'>";
                                            echo "<td id='td2' >";
                                                echo "<p id='pone'>";
                                                    echo $rows['note_id'];
                                                echo "</p>";                                 
                                            echo "</td>";
                                        echo "</tr>";
                                        echo "<tr id='tr3' class='file'>";
                                            echo "<td id='td3' >";
                                                echo "<p id='pone'>";
                                                    $filen=$rows['note'];
                          
                                                    echo "<a href='NoteFiles/$filen' target='_blank'>";
                                                    echo "Notes
                                                    </a>";
                                                   
                                                    
                                                echo "</p>";                                 
                                            echo "</td>";
                                        echo "</tr>";
                                    echo "</table>";
                                        }
                                  
                                 
                                    echo "</td>";
                          echo "</tr>";
                                
                        }
                                 
                        ?>
       
                        </tbody>
                    </table>
         </div>
                   
                         

                </div>
                <div class="col-sm-3 col-md-6 col-lg-4" style="border-left-style:solid;backdrop-filter: blur(20px);">
                    <center>
                        <h3>About You.</h3>
                        
                        <?php if(!empty($msg)): ?>
                            <div class="alert <?php echo $css_class; ?>">
                        <?php echo $msg; ?>
                            </div>
                        <?php endif;?>
                    <table cellpadding="4">
                        <tr>
                            <div class="profile-card">
                                <div class="image-container">
                                    <?php 
                                         include_once('phpConnect.php');
                                        $username =$_SESSION['user'];
                                        $sqlq="select propic from student where st_id='$username'";
                                        $result=mysqli_query($connection,$sqlq);
                                        $fgot=mysqli_fetch_all($result,MYSQLI_ASSOC);
                                        foreach($fgot as $pic);
                                    ?>
                                    <form method="post" action="" enctype="multipart/form-data">
                                    <img src="profile/<?php echo $pic['propic']?>" style="border-radius:150px;" width="250px" onclick="triggerClick()" style="width:300px" id="displayProfile">
                                        
                                    <input type="file" name="file" onchange="displayImage(this)" id="file" class="form-control" style="display:none;">
                                        <button type="submit" name="submit" class="btn btn-primary btn-block">UPDATE</button>
                                    </form>    
                                </div>
                                
                            </div>
                        </tr>
                        <?php
                            $username =$_SESSION['user'];
                            $edit_state = false;
                            include_once('phpConnect.php');
                            if(isset($_POST['submit'])){
                                
                                $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
                                $tname = $_FILES["file"]["tmp_name"];
                                $uploads_dir="C:/wamp/www/Project/profile";
                                move_uploaded_file($tname,$uploads_dir.'/'.$pname);
                                $sqlQ="update student set propic='$pname' where st_id='$username'";

                                if(mysqli_query($connection,$sqlQ)){
                                    echo "file upload success";
                                }
                                else{
                                    echo "cannot upload file";
                                }
                            }
                        ?>
                        
                        <?php
                            include_once('phpConnect.php');
                            $username =$_SESSION['user'];
                            $query1="select *from student where st_id='$username'";
                            $result1=mysqli_query($connection,$query1);
                            while($rows=mysqli_fetch_assoc($result1)){
                              $fn= $rows['fname'];  
                              $ln= $rows['lname'];  
                              $age= $rows['age'];  
                              $gen= $rows['gender'];  
                              $add= $rows['address'];  
                              $mail= $rows['email'];  
                              $no= $rows['contact_no'];  
                                $gender;
                                if($gen=='M'){
                                    $gender='Male';
                                }else{
                                    $gender="Female";
                                }
                            
                                echo "<tr>";
                                echo  "<th>First Name: </th>";
                                echo  "<td>$fn</td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo  "<th>Last Name: </th>";
                                echo  "<td>$ln</td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo  "<th>Age: </th>";
                                echo  "<td>$age</td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo  "<th>Gender: </th>";
                                echo  "<td>$gender</td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo  "<th>Address: </th>";
                                echo  "<td>$add</td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo  "<th>Email: </th>";
                                echo  "<td>$mail</td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo  "<th>Contact No: </th>";
                                echo  "<td>0$no</td>";
                                echo "</tr>";
                            }
                        ?>
                         <?php
                            include_once('phpConnect.php');
                            $username =$_SESSION['user'];
                            $query1="select dep_name from department where dep_id in(select dep_id from student where st_id='$username')";
                            $result1=mysqli_query($connection,$query1);
                            while($rows=mysqli_fetch_assoc($result1)){
                                $dep=$rows['dep_name'];
                                echo "<tr>";
                                echo  "<th>Department: </th>";
                                echo  "<td>$dep</td>";
                                echo "</tr>";
                            }
                        ?>
                        </table>
                    </center>
                </div>
          </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <script src="proScript.js"></script>
       
    </body>
    <footer class='f'>
        <div class='footer'  style="background-color:rgba(0,0,0, 0.4);height:auto;">
            <p class="fp" style='font-family: pristina;font-size:20px; margin-top:5px;margin-bottom:5px; font-weight: bold;'>Student Management System All rights recived</p>
        </div>
    </footer>
</html>
  