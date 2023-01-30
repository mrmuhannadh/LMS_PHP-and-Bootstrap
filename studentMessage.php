<html>
    <head>
        <link href="css/window.css" type="text/css" rel="stylesheet">
        <title>Student</title>
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
                   
                    <li class="nav-item"><a href="studentWindow.php" class="nav-link nav-item ">Dashboard</a></li>
                    <li class="nav-item"><a href="studentNote.php" class="nav-link">Subject</a></li>
                    <li class="nav-item"><a href="Marks.php" class="nav-link">Marks</a></li>
                    <li class="nav-item"><a href="studentAttendence.php" class="nav-link">Attendence</a></li>
                    <li class="nav-item"><a href="" class="nav-link active">Messages</a></li>
                    
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
                    width:430px;
                    height: 350px;
                    margin: 50px auto;
                    text-align: left;
                    padding-left: 70px;
                    padding-top: 30px;
                    padding-bottom: 30px;
                    border: 1px solid #bbbbbb;
                    border-radius: 5px;
                }
               
                
            </style>";
        ?>
        
            
        <div class="container"> 
        <div class="row">    
                  <div class="col-sm-6">
                     
                        <form method='post' action='' class='fmuser'>
                            <caption><h3> Send a Private Message</h3></caption>  
                        <table border='0' class="tbl2">
                        <div class='input-group'>
                        <tr id='tr2'>
                            <td>
                                <label>Reciver ID</label>
                            </td>
                            <td>
                                <input type='text' name='stid' placeholder='Enter Reciver ID' required>
                            </td>  
                        </tr> 
                         <tr id='tr2'>
                            <td>
                                <label>Date</label>
                            </td>
                            <td>
                                <input type='date' name='date'>
                            </td>  
                        </tr> 
                        <tr id='tr2'>
                            <td>
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea cols="23" rows="4" name="prsmsg" required></textarea>
                            </td>  
                        </tr>     
                        
                        <tr id='btnrow'>
                        
                            <td id='td1'>
                               <center> <button type='submit' name='send' class='btn'>Send</button> </center>
                            </td>

                            <td>
                               <center> <button type='reset' name='deletesub' class='btn'>Clear</button> </center>
                            </td>
                            </tr>
                            </div>
                        </table>
                        </form>
                      <form method='post' action='' class='fmuser'>
                            <caption><h3> Send a Public Message</h3></caption>  
                        <table border='0' class="tbl2">
                        <div class='input-group'>
                        
                         <tr id='tr2'>
                            <td>
                                <label>Date</label>
                            </td>
                            <td>
                                <input type='date' name='date'>
                            </td>  
                        </tr> 
                        <tr id='tr2'>
                            <td>
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea cols="23" rows="4" name="prsmsg" required></textarea>
                            </td>  
                        </tr>     
                        
                        <tr id='btnrow'>
                        
                            <td id='td1'>
                               <center> <button type='submit' name='sendpub' class='btn'>Send</button> </center>
                            </td>

                            <td>
                               <center> <button type='reset' name='deletesub' class='btn'>Clear</button> </center>
                            </td>
                            </tr>
                            </div>
                        </table>
                        </form>
                      
                        </div>
                
                
                    <div class="col-sm-6">
                        <br/>
                        <br/>
                        <center><caption><h3>Messages Recived</h3></caption></center>
                        <table class='tbl1'>
                <thead>
                    <tr>
                        <th id='th1'>Sender ID</th>
                        <th id='th1'>Date</th>
                        <th id='th1'>Time</th>
                        <th id='th1'>Message</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                        $username=$_SESSION['user'];
                        include_once('phpConnect.php');
                        $querysub="select from_id,date,time,message from chat where to_id='$username' or to_id='all' and from_id!='$username'";
                        $resultsub=mysqli_query($connection,$querysub);
                    
                        while($rows2=mysqli_fetch_assoc($resultsub)){
                            echo "<tr id='tr1'>";
                                echo "<td>";
                                    echo $rows2['from_id'];
                                echo "</td>";
                                echo "<td>";
                                    echo $rows2['date'];
                                echo "</td>";
                            echo "<td>";
                                    echo $rows2['time'];
                                echo "</td>";
                                echo "<td>";
                                    echo $rows2['message'];
                                echo "</td>";
                            echo "</tr>";
                            
                        }
                        ?>
       
                        </tbody>
                    </table>
                        <br/>
                        <br/>
                        <center><caption><h3>Messages Sent</h3></caption></center>
                        <table class='tbl1' id='tblsent'>
                <thead>
                    <tr>
                        <th id='th1'>Reciver ID</th>
                        <th id='th1'>Date</th>
                        <th id='th1'>Time</th>
                        <th id='th1'>Message</th>
                        
                    </tr>
                    
                </thead>
                <tbody>
                    
                    <?php
                        $username=$_SESSION['user'];
                        include_once('phpConnect.php');
                        $querysub="select to_id,date,time,message from chat where from_id='$username'";
                        $resultsub=mysqli_query($connection,$querysub);
                    
                        while($rows2=mysqli_fetch_assoc($resultsub)){
                            echo "<tr id='tr1'>";
                                echo "<td>";
                                    echo $rows2['to_id'];
                                echo "</td>";
                                echo "<td>";
                                    echo $rows2['date'];
                                echo "</td>";
                                echo "<td>";
                                    echo $rows2['time'];
                                echo "</td>";
                                echo "<td>";
                                    echo $rows2['message'];
                                echo "</td>";
                            echo "</tr>";
                            
                        }
                        ?>
       
                        </tbody>
                    </table>
                    </div>
                </div>
        </div>
                    <?php
                    $username=$_SESSION['user'];    
                    if(isset($_POST['send'])){
                        $stid=$_POST['stid'];
                        $date=$_POST['date'];
                        $msgs=$_POST['prsmsg'];
                        $time=date("H:i:s");
                            
                            $queryinsertsub="insert into chat values('$username','$stid','$date','$msgs','$time')";
                            
                            mysqli_query($connection,$queryinsertsub);
                            echo "<script>alert('Private Message Sent Successfully')</script>";
                            echo "<script>window.location.assign('studentMessage.php');</script>";
                       
                    }
                    if(isset($_POST['sendpub'])){
                        
                        $date=$_POST['date'];
                        $msgs=$_POST['prsmsg'];
                        $time=date("H:i:s");
                            
                            $queryinsertsub="insert into chat values('$username','all','$date','$msgs','$time')";
                            
                            mysqli_query($connection,$queryinsertsub);
                             echo "<script>alert('Public Message Sent Successfully')</script>";
                            echo "<script>window.location.assign('studentMessage.php');</script>";
                    }
                    if(isset($_POST['deletesent'])){
                     
                        
                            
                            $queryinsertsub="delete from chat where from_id='$username'";
                            
                            mysqli_query($connection,$queryinsertsub);
                                    
                            echo "Messages cleared";
                        echo "<script>window.location.assign('studentMessage.php');</script>";
                       
                    }
                    ?>
       
                   

        </div>
        
        
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
