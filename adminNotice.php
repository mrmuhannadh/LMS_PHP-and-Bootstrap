<html>
    <head>
        <link href="css/window.css" type="text/css" rel="stylesheet">
        <title>Admin</title>
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
                    <li class="nav-item"><a href="adminUsers.php" class="nav-link ">Users</a></li>
                    <li class="nav-item"><a href="adminStudents.php" class="nav-link">Students</a></li>
                    <li class="nav-item"><a href="adminLecture.php" class="nav-link">Lectures</a></li>
                    <li class="nav-item"><a href="adminSubject.php" class="nav-link">Subjects</a></li>
                    <li class="nav-item"><a href="" class="nav-link active">Notices</a></li>
                    
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
                    width:400px;
                    height: 300px;
                    margin: 50px auto;
                    text-align: left;
                    padding: 50px;
                    border: 1px solid #bbbbbb;
                    border-radius: 5px;
                    
               
                
            </style>";
        ?>
        
            <table class='tbl1'>
                <thead>
                    <tr class='trtop'>
                        <th id='th1'>Notice ID</th>
                        <th id='th1'>Date</th>
                        <th id='th1'>Notice</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                        include_once('phpConnect.php');
                        $querynotice="select *from notice";
                        $result=mysqli_query($connection,$querynotice);
                        while($rows=mysqli_fetch_array($result)){
                            echo "<tr id='tr1'>";
                            echo "<td>";
                            echo $rows['notice_id'];
                            echo "</td>";
                            echo "<td>";
                            echo $rows['date'];
                            echo "</td>";
                            echo "<td>";
                            echo $rows['notice'];
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
                         <h2>Add New Notice</h2>  
                        <table border='0' class="tbl2">
                        <div class='input-group'>
                        <tr id='tr2'>
                            <td>
                                <label>Notice ID</label>
                            </td>
                            <td>
                                <input type='text' name='notice_id' placeholder='Enter Notice ID'>
                            </td>
                        </tr>
                        </div>
                        <div class='input-group'>
                        <tr id='tr2'>
                            <td>
                                <label>Date</label>
                            </td>
                            <td>
                                <input type='date' name='date'>
                            </td>
                        </tr>
                        </div>
                        <div class='input-group'>
                        <tr id='tr2'>
                            <td>
                                <label>Notice</label>
                            </td>
                            <td>
                                <textarea name="notice" rows="4" cols="23"></textarea>
                            </td>
                        </tr>
                        </div>
                        
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
                            
                            
                        </table>
                        </form>
                        </div>
                
                
                    <div class="col-sm-6">
                    <form method='post' action='' class='fmuser2'>
                        <h2>Delete Notice</h2>  
                        <table border='0' class="tbl2">
                        <div class='input-group'>
                        <tr id='tr2'>
                            <td>
                                <label>Notice ID</label>
                            </td>
                            <td style="padding-left:30px;">
                                <input type='text' name='notice_id' placeholder='Enter Notice ID'>
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
                    if(isset($_POST['save'])){
                        $un=$_POST['notice_id'];
                        $date=$_POST['date'];                        
                        $notice=$_POST['notice'];
                        
                            $queryinsert="insert into notice values('$un','$date','$notice')";
                            mysqli_query($connection,$queryinsert);
                            echo "<script>alert('New Notice Added Successfully');</script>";
                            echo "<script>window.location.assign('adminNotice.php');</script>";
                       
                    }
                    if(isset($_POST['update'])){
                        $un=$_POST['notice_id'];
                        $date=$_POST['date'];                        
                        $notice=$_POST['notice'];
                        
                           
                            $queryinsert="update notice set notice='$notice', date='$date' where notice_id='$un'";
                            mysqli_query($connection,$queryinsert);
                            echo "<script>alert('Notice Updated Successfully');</script>";
                            echo "<script>window.location.assign('adminNotice.php');</script>";
                       
                    }
                    if(isset($_POST['delete'])){
                        $un=$_POST['notice_id'];
                        
                       
                            $querydel="delete from notice where notice_id='$un'";
                            mysqli_query($connection,$querydel);
                            echo "<script>alert('Notice Deleted Successfully');</script>";
                            echo "<script>window.location.assign('adminNotice.php');</script>";
                        
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
