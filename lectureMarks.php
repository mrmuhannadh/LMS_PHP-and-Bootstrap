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
                    <li class="nav-item"><a href="lectureStudent.php" class="nav-link " >Student Details</a></li>
                    <li class="nav-item"><a href="lectureAddnotes.php" class="nav-link" >Add Notes</a></li>
                    <li class="nav-item"><a href="" class="nav-link active">Marks</a></li>
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
        ?>
        
            <table class='tbl1'>
                <thead>
                    <tr>
                                <th id='ths'><center>Subect Name</center></th>
                                <th id='ths'><center>Student ID</center></th>
                                <td id='tds'>Assignment</td>
                                <td  id='tds'>Quiz</td>
                                <td  id='tds'>Mid</td>
                                <td  id='tds'>Final</td>
                                <td id='tds'>Total Marks</td>
                                <td id='tds'>Grade</td>
                                </tr>
                </thead>
                <tbody>
                    
                    <?php
                        include_once('phpConnect.php');
                            $username =$_SESSION['user'];
                       $query1=" select subject.sub_name,marks.st_id,marks.Assignment,marks.Mid,marks.Final,marks.Quiz,(Assignment+mid+Final+Quiz) as total,case  when quiz+mid+assignment+final>=75 then 'A' when quiz+mid+assignment+final>=65 then 'B' when quiz+mid+assignment+final>=55 then 'C' when quiz+mid+assignment+final>=35 then 'S' when quiz+mid+assignment+final<35 then 'W' end as Grade from marks inner join subject where subject.sub_id=marks.sub_id and subject.lec_id='$username'";
                            $result1=mysqli_query($connection,$query1);
                            while($rows=mysqli_fetch_assoc($result1)){
                            echo "<tr id='tr1'>";
                            echo "<td style='text-align:left;'>";
                            echo $rows['sub_name'];
                            echo "</td>";
                            echo "<td>";
                            echo $rows['st_id'];
                            echo "</td>";
                            echo "<td>";
                            echo $rows['Assignment'];
                            echo "</td>";
                            echo "<td>";
                            echo $rows['Quiz'];
                            echo "</td>";
                            echo "<td>";
                            echo $rows['Mid'];
                            echo "</td>";
                            echo "<td>";
                            echo $rows['Final'];
                            echo "</td>";    
                            echo "<td>";
                            echo $rows['total'];
                            echo "</td>";
                            echo "<td>";
                            echo $rows['Grade'];
                            echo "</td>";
                            
                            
                        }
                        ?>
       
                        </tbody>
                    </table>
         </div>
        <div class="container"> 
        <div class="row">    
                  <div class="col-sm-6">
                     
                        <form method='post' action='' class='fmuser'>
                            <caption><h3> Add Marks</h3></caption>  
                        <table border='0' class="tbl2">
                        <div class='input-group'>
                        <tr id='tr2'>
                            <td>
                                <label>Subject ID</label>
                            </td>
                            <td>
                                <input type='text' name='subid' placeholder='SUB000' required>
                            </td>  
                        </tr> 
                         <tr id='tr2'>
                            <td>
                                <label>Student ID</label>
                            </td>
                            <td>
                                <input type='text' name='stid' placeholder='TG000' required>
                            </td>  
                        </tr> 
                        <tr id='tr2'>
                            <td>
                                <label>Quiz Marks</label>
                            </td>
                            <td>
                                <input type='text' name='qm' placeholder='00.00' required>
                            </td>  
                        </tr>     
                        <tr id='tr2'>
                            <td>
                                <label>Mid Marks</label>
                            </td>
                            <td>
                                <input type='text' name='mm' placeholder='00.00' required>
                            </td>  
                        </tr> 
                        <tr id='tr2'>
                            <td>
                                <label>Assignment Marks</label>
                            </td>
                            <td>
                                <input type='text' name='am' placeholder='00.00' required>
                            </td>  
                        </tr>    
                        <tr id='tr2'>
                            <td>
                                <label>Final Marks</label>
                            </td>
                            <td>
                                <input type='text' name='fm' placeholder='00.00' required>
                            </td>  
                        </tr>     
                        <tr id='btnrow' >
                            <td id='td1'>
                               <center> <button type='submit' name='update' class='btn'>UPDATE</button> </center>
                            </td>   
                            <td id='td1'>
                               <center> <button type='submit' name='add' class='btn'>ADD</button> </center>
                            </td>
                            
                            
                            </tr>
                            </div>
                        </table>
                        </form>
                      
                      
                        </div>
                
                
                    <div class="col-sm-6">
                        <form method='post' action='' class='fmuser2'>
                            <caption><h3> Delete Marks</h3></caption>  
                        <table border='0' class="tbl2">
                        <div class='input-group'>
                        
                         <tr id='tr2'>
                            <td>
                                <label>Subject ID</label>
                            </td>
                            <td>
                                <input type='text' name='subidd' placeholder='SUB000' required>
                            </td>  
                        </tr> 
                        <tr id='tr2'>
                            <td>
                                <label>Student ID</label>
                            </td>
                            <td>
                               <input type='text' name='stidd' placeholder='TG000' required>
                            </td>  
                        </tr>     
                        
                        <tr id='btnrow'>
                        
                            <td id='td1' colspan="2">
                               <center> <button type='submit' name='del' class='btn' style='background-color:red;'>DELETE</button> </center>
                            </td>

                            
                            </tr>
                            </div>
                        </table>
                        </form>
                    </div>
                </div>
        </div>
                    <?php
                    $username=$_SESSION['user'];    
                    if(isset($_POST['add'])){
                        $subid=$_POST['subid'];
                        $stid=$_POST['stid'];
                        $qm=$_POST['qm'];
                        $mm=$_POST['mm'];
                        $am=$_POST['am'];
                        $fm=$_POST['fm'];
                        if($subid!=""){
                            if(!preg_match("/^[SUB]+[0-9]{3}/",$subid)){
                            $nameErr = "The Format Should be SUB###";
                            echo "<script>alert('$nameErr')</script>";
                            }
                        }
                        if($stid==""){
                            if(!preg_match("/^([TG]+[0-9]{3})/",$stid)){
                            $nameErr = "The Format Should be TG###";
                            echo "<script>alert('$nameErr')</script>";
                            }
                        }
                        
                            
                            $queryinsertmarks="insert into marks values('$stid','$subid','$qm','$mm','$am','$fm')";
                            echo "<script>window.location.assign('lectureMarks.php');</script>";
                            echo "<script>window.location.assign('lectureMarks.php');</script>";
                            mysqli_query($connection,$queryinsertmarks);
                            echo "Marks Added";
                       
                    }
                    if(isset($_POST['del'])){
                        $subid=$_POST['subidd'];
                        $stid=$_POST['stidd'];
                        if(!preg_match("/^[SUB]+[0-9]{3}/",$subid)){
                            $nameErr = "The Format Should be SUB###";
                            echo "<script>alert('$nameErr')</script>";
                        }
                        if(!preg_match("/^([TG]+[0-9]{3})/",$stid)){
                            $nameErr = "The Format Should be TG###";
                            echo "<script>alert('$nameErr')</script>";
                        }    
                            $querydelete="delete from marks where st_id='$stid' and sub_id='$subid'";
                            echo "<script>window.location.assign('lectureMarks.php');</script>";
                            mysqli_query($connection,$querydelete);
                            echo "Deleted";
                       
                    }
                    if(isset($_POST['update'])){
                        $subid=$_POST['subid'];
                        $stid=$_POST['stid'];
                        $qm=$_POST['qm'];
                        $mm=$_POST['mm'];
                        $am=$_POST['am'];
                        $fm=$_POST['fm'];
                        if(!preg_match("/^[SUB]+[0-9]{3}/",$subid)){
                            $nameErr = "The Format Should be SUB###";
                            echo "<script>alert('$nameErr')</script>";
                        }
                        if(!preg_match("/^([TG]+[0-9]{3})/",$stid)){
                            $nameErr = "The Format Should be TG###";
                            echo "<script>alert('$nameErr')</script>";
                        }    
                            $queryupdate="update marks set quiz='$qm',mid='$mm',assignment='$am',final='$fm' where st_id='$stid' and sub_id='$subid'";
                            echo "<script>window.location.assign('lectureMarks.php');</script>";
                            mysqli_query($connection,$queryupdate);
                            echo "Updated";
                       
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
