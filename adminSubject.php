<html>
    <head>
        <link href="css/window.css" type="text/css" rel="stylesheet">
        <title>Admin Subject</title>
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
                    <li class="nav-item"><a href="adminWindow.php" class="nav-link" ><div class="img"><img src="images/home2.png" width="30" height="30" alt="" style="padding-bottom:7px;padding-top:1px;">Dashboard</div></a></li>
                    <li class="nav-item"><a href="adminUsers.php" class="nav-link">Users</a></li>
                    <li class="nav-item"><a href="adminStudents.php" class="nav-link ">Students</a></li>
                    <li class="nav-item"><a href="adminLecture.php" class="nav-link  ">Lectures</a></li>
                    <li class="nav-item"><a href="" class="nav-link active">Subjects</a></li>
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
         echo "<link href='css/myCSS.css' type='text/css' rel='stylesheet'>";     
                //
            
        echo "<style>
               
                .newtopic{
                    margin: 20px auto;
                    padding: 10px;
                    border-radius: 5px;
                    color: white;
                    background: DarkSlateGrey;
                    border: 1px;
                    width:100%;
                    height:60px;
                    text-align: center;
                    font-size: 30px;
                    font-weight: bold;
                    padding-bottom: 10px;
                }   
                .fmuser2{
                    height:300px;
                    width:430px;
                }
                .tbl2{
                    margin-right:40px;
                }
            </style>";
        ?>
        
            <table class='tbl1'>
                <thead>
                    <tr class='trtop'>
                        <th id='th1'>Subject ID</th>
                        <th id='th1'>Subject Name</th>
                        <th id='th1'>Lecture ID</th>
                        <th id='th1'>Lecture Name</th>
                        <th id='th1'>Department</th>
                        
                          
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                        include_once('phpConnect.php');
                        $querysub=" select subject.sub_id,subject.sub_name,subject.lec_id,lecture.fname,lecture.dep_id from lecture inner join subject where subject.lec_id=lecture.lec_id;";
                        $resultsub=mysqli_query($connection,$querysub);
                    
                        while($rows2=mysqli_fetch_assoc($resultsub)){
                            echo "<tr id='tr1'>";
                                echo "<td>";
                                    echo $rows2['sub_id'];
                                echo "</td>";
                                echo "<td>";
                                    echo $rows2['sub_name'];
                                echo "</td>";
                                echo "<td>";
                                    echo $rows2['lec_id'];
                                echo "</td>";
                                echo "<td>";
                                    echo $rows2['fname'];
                                echo "</td>";
                                echo "<td>";
                                    echo $rows2['dep_id'];
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
                      
                        <form method='post' action='' class='fmuser'>
                            <h3>Add New Subject</h3>
                        <table border='0' class="tbl2" >
                        <div class='input-group'>
                        <tr id='tr2'>
                            <td>
                                <label>Subject ID</label>
                            </td>
                            <td>
                                <input type='text' name='subid' placeholder='Enter Subject ID' required>
                            </td>  
                        </tr>
                         <tr id='tr2'>
                            <td>
                                <label>Subject Name</label>
                            </td>
                            <td>
                                <input type='text' name='subname' placeholder='Enter Subject Name' required>
                            </td>  
                        </tr> 
                        <tr id='tr2'>
                            <td>
                                <label>Lecture ID</label>
                            </td>
                            <td>
                                <input type='text' name='lecid' placeholder='Enter Lecture ID' required>
                            </td>  
                        </tr>
                        <tr id='btnrow'>
                            
                            
                            <td id='td1' >
                                <button type='submit' name='update' class='btn' >Update</button> 
                            </td>
                            
                            <td id='td1'>
                               <center> <button type='submit' name='save' class='btn'>Save</button> </center>
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
                    <form method='post' action='' class='fmuser2'>
                         <h3>Delete Subject</h3> 
                        <table border='0' class="tbl2">
                        <div class='input-group'>
                        <tr id='tr2'>
                            <td>
                                <label>Subject ID</label>
                            </td>
                            <td style="padding-left:30px;">
                                <input type='text' name='userName' placeholder='Enter Subject ID' required>
                            </td>
                        </tr>
                            <tr>
                                 <td id="td2" >
                               <center> <button type='submit' name='delete' class='btn' style="background:red;">Delete</button> </center>
                            </td>
                                <td id="td2" >
                               <center> <button type='reset' name='deletesub' class='btn'>Clear</button> </center>
                            </td>
                            </tr>
                            
                        </div>
                        </table>
                    </form>
                    </div>
                </div>
        </div>
       <div class="newtopic">
            Assign Subject For Students
        </div>
        <div class="container">
            <table class='tbl1'>
                <thead>
                    <tr>
                        <th id='th1'>Subject ID</th>
                        <th id='th1'>Student ID</th>
                        <th id='th1'>Department</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                        include_once('phpConnect.php');
                        $querysub="select stusub.sub_id,stusub.st_id,student.dep_id from stusub inner join student where stusub.st_id=student.st_id;";
                        $resultsub=mysqli_query($connection,$querysub);
                    
                        while($rows2=mysqli_fetch_assoc($resultsub)){
                            echo "<tr id='tr1'>";
                                echo "<td>";
                                    echo $rows2['sub_id'];
                                echo "</td>";
                                echo "<td>";
                                    echo $rows2['st_id'];
                                echo "</td>";
                                echo "<td>";
                                    echo $rows2['dep_id'];
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
                     
                        <form method='post' action='' class='fmuser'>
                            <h3>Assign Subject to Student</h3>
                        <table border='0' class="tbl2">
                        <div class='input-group'>
                        <tr id='tr2'>
                            <td>
                                <label>Subject ID</label>
                            </td>
                            <td>
                                <input type='text' name='subid' placeholder='Enter Subject ID' required>
                            </td>  
                        </tr>
                         <tr id='tr2'>
                            <td>
                                <label>Student ID</label>
                            </td>
                            <td>
                                <input type='text' name='stid' placeholder='Enter Student ID' required>
                            </td>  
                        </tr> 
                        
                        <tr id='btnrow'>
                            
                            
                            <td id='td1' >
                                <button type='submit' name='updatesub' class='btn' >Update</button> 
                            </td>
                            
                            <td id='td1'>
                               <center> <button type='submit' name='savesub' class='btn'>Save</button> </center>
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
                    <form method='post' action='' class='fmuser2'>
                            <h3>Remove Assigned Subject</h3>
                        <table border='0' class="tbl2">
                        <div class='input-group'>
                        <tr id='tr2'>
                            <td>
                                <label>Subject ID</label>
                            </td>
                            <td style="padding-left:30px;">
                                <input type='text' name='userName' placeholder='Enter Subject ID' required>
                            </td>
                        </tr>
                            <tr >
                                 <td id="td2" >
                               <center> <button type='submit' name='deletesub' class='btn' style="background:red;">Delete</button> </center>
                            </td>
                            
                                 <td id="td2" >
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
                    
                    if(isset($_POST['save'])){
                        $sub=$_POST['subid'];
                        $subname=$_POST['subname'];
                        $lc=$_POST['lecid'];
                        
                            
                            $queryinsertsub="insert into subject values('$sub','$subname','$lc')";
                            
                            mysqli_query($connection,$queryinsertsub);
                            echo "<script>alert('Subject Added Successfully');</script>";
                            echo "<script>window.location.assign('adminSubject.php');</script>";
                            
                       
                    }
                    if(isset($_POST['update'])){
                        $sub=$_POST['subid'];
                        $subname=$_POST['subname'];
                        $lc=$_POST['lecid'];
                        
                            $queryupdatelec="update subject set sub_name='$subname',lec_id='$lc' where sub_id='$sub'";
                            
                            
                            mysqli_query($connection,$queryupdatelec);
                            echo "<script>alert('Subject Updated Successfully');</script>";
                            echo "<script>window.location.assign('adminSubject.php');</script>";
                            
                        
                    }
                    if(isset($_POST['delete'])){
                        $un=$_POST['userName'];
                            //bcz the subject is link to student so here i need to delete that link first
                            $querydellink="delete from stusub where sub_id='$un'";
                            $querydel="delete from subject where sub_id='$un'";
                            mysqli_query($connection,$querydellink);
                            mysqli_query($connection,$querydel);
                            
                           
                            echo "<script>alert('Subject Deleted Successfully');</script>";
                            echo "<script>window.location.assign('adminSubject.php');</script>";
                            
                        }else{
                            $_SESSION['msg']="Cannot delete the details";
                           
                        }
                    if(isset($_POST['savesub'])){
                        $sub=$_POST['subid'];
                        $st=$_POST['stid'];
                        
                        
                            
                            $queryinsertsub="insert into stusub values('$sub','$st')";
                            
                            mysqli_query($connection,$queryinsertsub);
                           
                            echo "<script>alert('Subject Assigned Successfully');</script>";
                            echo "<script>window.location.assign('adminSubject.php');</script>";
                            
                       
                    }
                    if(isset($_POST['updatesub'])){
                        $sub=$_POST['subid'];
                        $st=$_POST['stid'];
                        
                        
                            $queryupdatelec="update stusub set st_id='$st' where sub_id='$sub'";
                            
                            
                            mysqli_query($connection,$queryupdatelec);
                            echo "<script>alert('Assigned Subject Updated Successfully');</script>";
                            echo "<script>window.location.assign('adminSubject.php');</script>";
                            
                        
                    }
                    if(isset($_POST['deletesub'])){
                        $un=$_POST['userName'];
                            //bcz the subject is link to student so here i need to delete that link first
                            $querydellink="delete from stusub where sub_id='$un'";
                            
                            mysqli_query($connection,$querydellink);
                            echo "<script>alert('Assigned Subject Removed Successfully');</script>";
                            echo "<script>window.location.assign('adminSubject.php');</script>";
                            
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
