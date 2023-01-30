<html>
    <head>
        <link href="css/window.css" type="text/css" rel="stylesheet">
        <title>Lecture</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
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
                    
                    <li class="nav-item"><a href="lectureWindow.php" class="nav-link nav-item" >Dashboard</a></li>
                    <li class="nav-item"><a href="lectureSubject.php" class="nav-link">Subjects</a></li>
                    <li class="nav-item"><a href="lectureStudent.php" class="nav-link">Student Details</a></li>
                    <li class="nav-item"><a href="lectureAddnotes.php" class="nav-link " >Add Notes</a></li>
                    <li class="nav-item"><a href="lectureMarks.php" class="nav-link">Marks</a></li>
                    <li class="nav-item"><a href="" class="nav-link active">Attendence</a></li>
                    
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
        echo "<style>.fmuser2{
                    width:450px;
                    }
                    .tbl1{
                        width:75%;
                    }
                </style>";
        
        ?>
        <center>
            <table class='tbl1'>
                <thead>
                    <tr>
                        
                        <th id='th1'>Student ID</th>
                        <th id='th1'>Subject ID</th>
                        <th id='th1'>Subject Name</th>
                        <th id='th1'>Date</th>
                        <th id='th1'>Status</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                        
                        $username=$_SESSION['user'];
                        include_once('phpConnect.php');
                        $querynote="select attendence.st_id, attendence.sub_id, attendence.date, attendence.status,subject.sub_name from subject inner join  attendence where  attendence.sub_id=subject.sub_id and subject.lec_id='$username'";
                        $result=mysqli_query($connection,$querynote);
                        while($rows=mysqli_fetch_array($result)){
                            echo "<tr id='tr1'>";
                            echo "<td>";
                            echo $rows['st_id'];
                            echo "</td>";
                            echo "<td>";
                            echo $rows['sub_id'];
                            echo "</td>";
                            echo "<td>";
                            echo $rows['sub_name'];
                            echo "</td>";
                            echo "<td>";
                            echo $rows['date'];
                            echo "</td>";
                            echo "<td>";
                            echo $rows['status'];
                            echo "</td>";
                            
                            echo "</tr>";
                            
                        }
                        ?>
       
                        </tbody>
                    </table>
        </center>
         </div>
                    
            <div class="container"> 
                <?php if(isset($_SESSION['msg'])):?>
                        <div class='msg'>
                            <?php
                                echo $_SESSION['msg'];
                                
                                unset($_SESSION['msg']);
                            ?>
                        </div>
                        <?php endif?>
            <div class="row">    
                  <div class="col-sm-6">
                     
                        <form method='post' action='' class='fmuser' required>
                            <h3>ADD ATTENDENCE</h3>  
                        <table border='0' class="tbl2">
                        <div class='input-group'>
                        <tr id='tr2'>
                            <td>
                                <label>Student ID</label>
                            </td>
                            <td>
                                <input type="text" name="stid" placeholder="TG000" required>
                            </td>
                        </tr>
                        </div>
                        <div class='input-group'>
                        <tr id='tr2'>
                            <td>
                                <label>Subject ID</label>
                            </td>
                            <td>
                                <input type="text" name="subid" placeholder="SUB000" required>
                            </td>
                        </tr>
                        </div>
                        <div class='input-group'>
                        <tr id='tr2'>
                            <td>
                                <label>Date</label>
                            </td>
                            <td>
                                <input type="date" name="date">
                            </td>
                        </tr>
                        </div>
                        <div class='input-group'>
                        <tr id='tr2'>
                            <td>
                                <label>Status</label>
                            </td>
                            <td>
                                <select name="status">
                                    <option value="PR">Present</option>
                                    <option value="AB">Absent</option>
                                    <option value="ME">Medical</option>
                                </select>
                            </td>
                        </tr>
                        </div>
                        
                        <tr id='btnrow'>
                            
                            
                            <td id='td1' >
                                <button type='submit' name='update' class='btn' >Update</button> 
                            </td>
                            
                            <td id='td1'>
                               <center> <button type='submit' name='submit' class='btn'>Save</button> </center>
                            </td>
                           
                           
                        </tr>
                        <tr>
                            <td colspan='2'>
                               <center> <button type='reset' name='deletesub' class='btn'>Clear</button> </center>
                            </td>
                        </tr>  
                            
                            
                        </table>
                        </form>
                        </div>
                
                
                    <div class="col-sm-6">
                    
                    <form method="post" enctype="multipart/form-data" action="" class='fmuser2'>  
                        <h3>Delete Attendence</h3>
                        <table border='0' class="tbl2">
                        <div class='input-group'>
                        <tr id='tr2'>
                            <td>
                                <label>Student ID</label>
                            </td>
                            <td style="padding-left:30px;">
                                <input type="text" name="stid" placeholder="TG000" required>
                            </td>
                        </tr>
                        <tr id='tr2'>
                            <td>
                                <label>Subject ID</label>
                            </td>
                            <td style="padding-left:30px;">
                                <input type="text" name="subid" placeholder="SUB000" required>
                            </td>
                        </tr>  
                         <tr id='tr2'>
                            <td>
                                <label>Date</label>
                            </td>
                            <td style="padding-left:30px;">
                                <input type="date" name="date">
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
                    include_once('phpConnect.php');
                    if(isset($_POST['submit'])){
                        $stid=$_POST['stid'];
                        $sub = $_POST['subid'];
                        $date = $_POST['date'];
                        $status = $_POST['status'];
                        $sqlQ="insert into attendence values('$stid','$sub','$date','$status')";

                        if(mysqli_query($connection,$sqlQ)){
                            echo "<script>alert('Attendence Added Succesfully')</script>"; echo "<script>window.location.assign('lectureAddAtten.php');</script>";
                        }
                        else{
                            echo "<script>window.location.assign('lectureAddAtten.php');</script>";
                            echo "<script>alert('Cannot Add Attendence')</script>";
                            
                            
                        }
                        unset($_POST['submit']);
                    }
                    if(isset($_POST['update'])){
                        $stid=$_POST['stid'];
                        $sub = $_POST['subid'];
                        $date = $_POST['date'];
                        $status = $_POST['status'];
                        $sqlQ="update attendence set st_id='$stid',sub_id='$sub',date='$date',status='$status' where st_id='$stid' and sub_id='$sub' and date='$date'";    
                        if(mysqli_query($connection,$sqlQ)){
                            echo "<script>window.location.assign('lectureAddAtten.php');</script>";
                            echo "<script>alert('Attendence Updated Successfully')</script>";
                             
                        }
                        else{
                            echo "<script>window.location.assign('lectureAddAtten.php');</script>";
                            echo "<script>alert('Cannot Update Attendence')</script>";
                             
                        }
                       
                    }
                    if(isset($_POST['delete'])){
                        $stid = $_POST['stid'];
                        $sub = $_POST['subid'];
                        $date = $_POST['date'];
                        
                        $sqlQ="delete from attendence where st_id='$stid' and sub_id='$sub' and date='$date'";    
                        if(mysqli_query($connection,$sqlQ)){
                            echo "<script>window.location.assign('lectureAddAtten.php');</script>"; 
                            echo "<script>alert('Attendence Deleted Successfully')</script>";
                            
                            
                            
                        }
                        else{
                            echo "<script>window.location.assign('lectureAddAtten.php');</script>"; 
                            echo "<script>alert('Cannot Delete Attendence')</script>"; 
                        }
                      
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
