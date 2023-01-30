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
                    <li class="nav-item"><a href="" class="nav-link active" >Add Notes</a></li>
                    <li class="nav-item"><a href="lectureMarks.php" class="nav-link">Marks</a></li>
                    <li class="nav-item"><a href="lectureAddAtten.php" class="nav-link">Attendence</a></li>
                    
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
            echo"<style>
                .fmuser{
                    width:500px;
                }
                .fmuser2{
                    width:450px;
                }
            </style>";
        ?>
        
            <table class='tbl1'>
                <thead>
                    <tr>
                        <th id='th1'>Subject ID</th>
                        <th id='th1'>Week</th>
                        <th id='th1'>File Name</th>
                        <th id='th1'>Subject Name</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                        
                        $username=$_SESSION['user'];
                        include_once('phpConnect.php');
                        $querynote="select note.sub_id,note.note_id,note.note,subject.sub_name from subject inner join note where note.sub_id=subject.sub_id and note.sub_id in(select sub_id from subject where lec_id in(select lec_id from lecture where lec_id='$username')) order by sub_id";
                        $result=mysqli_query($connection,$querynote);
                        while($rows=mysqli_fetch_array($result)){
                            echo "<tr id='tr1'>";
                            echo "<td>";
                            echo $rows['sub_id'];
                            echo "</td>";
                            echo "<td>";
                            echo $rows['note_id'];
                            echo "</td>";
                            echo "<td>";
                            echo $rows['note'];
                            echo "</td>";
                            echo "<td>";
                            echo $rows['sub_name'];
                            echo "</td>";
                            echo "</tr>";
                            
                        }
                        ?>
       
                        </tbody>
                    </table>
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
                     
                        <form method='post' action='' enctype="multipart/form-data" class='fmuser'>
                            <h3>Add / Update Note</h3> 
                        <table border='0' class="tbl2">
                        <div class='input-group'>
                        <tr id='tr2'>
                            <td>
                                <label>Week ID</label>
                            </td>
                            <td>
                                <input type="text" name="week" placeholder="Week01" required>
                            </td>
                        </tr>
                        </div>
                        <div class='input-group'>
                        <tr id='tr2'>
                            <td>
                                <label>Note</label>
                            </td>
                            <td>
                                <input type="file" name="file">
                            </td>
                        </tr>
                        </div>
                        <div class='input-group'>
                        <tr id='tr2'>
                            <td>
                                <label>Subject ID</label>
                            </td>
                            <td>
                                <input type="text" name="subject" placeholder="SUB000" required>
                            </td>
                        </tr>
                        </div>
                        
                        <tr id='btnrow'>
                            
                            
                            <td id='td1' >
                                <button type='submit' name='update' class='btn' >Update</button> 
                            </td>
                            
                            <td id='td1'>
                               <center> <button type='submit' name='submitf' class='btn'>Save</button> </center>
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
                    
                    <form method="post" enctype="multipart/form-data" class='fmuser2'>      
                        <h3>Delete Note</h3> 
                        <table border='0' class="tbl2">
                        <div class='input-group'>
                        <tr id='tr2'>
                            <td>
                                <label>Week No</label>
                            </td>
                            <td style="padding-left:30px;">
                                <input type="text" name="week" placeholder="Week000" required>
                            </td>
                        </tr>
                        <tr id='tr2'>
                            <td>
                                <label>Subject ID</label>
                            </td>
                            <td style="padding-left:30px;">
                                <input type="text" name="subject" placeholder="SUB000" required>
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
                    if(isset($_POST['submitf'])){
                        $week=$_POST['week'];
                        $sub = $_POST['subject'];
                        $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
                        $tname = $_FILES["file"]["tmp_name"];
                        $uploads_dir="C:/wamp/www/Project/NoteFiles";
                        move_uploaded_file($tname,$uploads_dir.'/'.$pname);
                        $sqlQ="insert into note(note_id,note,sub_id) values('$week','$pname','$sub')";
                        
                        if(mysqli_query($connection,$sqlQ)){
                             echo "<script>window.location.assign('lectureAddnotes.php');</script>";
                            echo "<script>alert('Note Uploaded Successfully')</script>";
                        }
                        else{
                            echo "<script>window.location.assign('lectureAddnotes.php');</script>";
                            echo "<script>alert('Note Not Uploaded Successfully')</script>";
                            
                        }
                    }
                    if(isset($_POST['update'])){
                        $week=$_POST['week'];
                        $sub = $_POST['subject'];
                        $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
                        $tname = $_FILES["file"]["tmp_name"];
                        $uploads_dir="C:/wamp/www/Project/NoteFiles";
                        move_uploaded_file($tname,$uploads_dir.'/'.$pname);
                        $sqlQ="update note set note_id='$week',note='$pname',sub_id='$sub' where note_id='$week' and sub_id='$sub'";    
                        if(mysqli_query($connection,$sqlQ)){
                             
                            echo "<script>alert('Note Updated Successfully')</script>";
                            echo "<script>window.location.assign('lectureAddnotes.php');</script>";
                        }
                        else{
                                
                            echo "<script>alert('Note is not Updated Successfully')</script>";
                            echo "<script>window.location.assign('lectureAddnotes.php');</script>"; 
                        }
                    }
                    
                    if(isset($_POST['delete'])){
                        $week=$_POST['week'];
                        $sub = $_POST['subject'];
                       
                        $sqlQ="delete from note where note_id='$week' and sub_id='$sub'";    
                        if(mysqli_query($connection,$sqlQ)){
                             echo "<script>window.location.assign('lectureAddnotes.php');</script>";
                            echo "<script>alert('Note Deleted Successfully')</script>";
                        }
                        else{
                             echo "<script>window.location.assign('lectureAddnotes.php');</script>";
                            echo "<script>alert('Note is Not Deleted Successfully')</script>";
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
