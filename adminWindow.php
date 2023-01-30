<html>
    <head>
        <link href="css/window.css" type="text/css" rel="stylesheet">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="jquery-tabledit-1.2.3/jquery.tabledit.min.js"></script> 
    </head>
    <body class="background">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <!--<font class="font1"><a href="" class="navbar-brand">Welcome Admin</a></font>-->
             <font class= "font1"><a href="" class="navbar-brand"><img src="images/mis.jpg" height="30px"></a></font>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="" class="nav-item nav-link active" ><div class="img"><img src="images/home2.png" width="30" height="30" alt="" style="padding-bottom:7px;padding-top:1px;">Dashboard</div></a></li>
                    <li class="nav-item"><a href="adminUsers.php" class="nav-link">Users</a></li>
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
        <marquee style="border-bottom-style:inset;border-top-style:inset;color:#fff; width:100%">Click to View</marquee>
        <div class="container">
            <?php
            echo "<link href='css/myCSS.css' type='text/css' rel='stylesheet'>";
            echo "<style>
                
                h2{
                filter: blur(0px);
                -webkit-filter: blur(0px);
                    text-align:center;
                    color:white;  
                    width:700px;
                    border: 5px outset rgba(75,1,1,1);
                    border-radius: 10px;
                    height:50px;
                    background:linear-gradient(30deg, rgba(64,0,0,1) 0%, rgba(117,1,1,1) 35%, rgba(134,2,2,1) 67%, rgba(75,1,1,1) 100%);
                    margin-bottom:50px;
                }
                .tb1,.tb2,.tb3,.tb4,.tb5{
                    width:50%;
                    margin-bottom:50px;
                    border-right:5px outset rgba(75,1,1,1);
                    border-left:5px outset rgba(75,1,1,1);
                    display:none;
                    text-align:center; 
                }
                #th1{
                    background-color:rgba(30,1,2,1);
                }
                .btn3{
                    background: #5F9EA0;
                    border-radius: 5px;
                    color: white;
                    margin-top:10px;
                    height:50px;
                }
            </style>";
        ?>
            
            <br/>
            <br/>
            <br/>
            <center>
            <h2 class='h21'>Users List</h2>  
             <table id='tbl1' class='tb1'>
                <thead>
                    <tr>
                        <th id='th1'>User ID</th>
                       
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
                            echo "</td id='td1'>";
                           
                            echo "<td id='td1'>";
                            echo $rows['post'];
                            echo "</td>";
                            
                            echo "</tr>";
                            
                        }
                       
                        ?>
       
                        </tbody>
                    </table>

               <h2 class='h22'>Lectures List</h2>
               
             <table id='tbl1' class='tb2'>
                <thead>
                    
                    <tr>
                        <th id='th1'>Lecture ID</th>
                        <th id='th1'>First Name</th>                        
                        <th id='th1'>Department</th> 
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                        include_once('phpConnect.php');
                        $querylec=" select * from lecture";
                        $resultlec=mysqli_query($connection,$querylec);
                    
                        while($rows2=mysqli_fetch_assoc($resultlec)){
                            echo "<tr id='tr1'>";
                                echo "<td>";
                                    echo $rows2['lec_id'];
                                echo "</td>";
                                echo "<td>";
                                    $fname=$rows2['fname'];
                                    echo $fname;
                                echo "</td>";
                                
                                echo "<td>";
                                    echo $rows2['dep_id'];
                                echo "</td>";
                                
                            echo "</tr>";
                            
                        }
                        ?>
       
                        </tbody>
                    </table>

            <h2 class='h23'>Student List</h2>
            
               
             <table id='tbl1' class='tb3'>
                <thead>
                    <tr>
                        <th id='th1'>Student ID</th>
                        <th id='th1'>First Name</th>                        
                        <th id='th1'>Department</th> 
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                        include_once('phpConnect.php');
                        $querylec=" select * from student";
                        $resultlec=mysqli_query($connection,$querylec);
                    
                        while($rows2=mysqli_fetch_assoc($resultlec)){
                            echo "<tr id='tr1'>";
                                echo "<td>";
                                    echo $rows2['st_id'];
                                echo "</td>";
                                echo "<td>";
                                    $fname=$rows2['fname'];
                                    echo $fname;
                                echo "</td>";
                                
                                echo "<td>";
                                    echo $rows2['dep_id'];
                                echo "</td>";
                                
                            echo "</tr>";
                            
                        }
                        ?>
                        </tbody>
                    </table>

            <h2 class='h24'>Notice List</h2>

             <table id='tbl1' class='tb4'>
                <thead>
                    <tr>
                        <th id='th1'>Notice ID</th>
                        <th id='th1'>Date</th>                        
                        <th id='th1'>Notice</th> 
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                        include_once('phpConnect.php');
                        $querylec=" select * from notice";
                        $resultlec=mysqli_query($connection,$querylec);
                    
                        while($rows2=mysqli_fetch_assoc($resultlec)){
                            echo "<tr id='tr1'>";
                                echo "<td>";
                                    echo $rows2['notice_id'];
                                echo "</td>";
                                echo "<td>";
                                    $fname=$rows2['date'];
                                    echo $fname;
                                echo "</td>";
                                
                                echo "<td>";
                                    echo $rows2['notice'];
                                echo "</td>";
                                
                            echo "</tr>";
                            
                        }
                        ?>
       
                        </tbody>
                    </table>
                <h2 class='h25'>Messages List</h2>

             <table id='tbl1' class='tb5'>
                <thead>
                    <tr>
                        
                            <td id='td' colspan="4">
                                <form method="post">
                               <center> <button type='submit' name='clearall' class='btn3' style="width:100%;color:maroon;">Clear All Messages</button> </center>
                                </form>
                            </td>

                            </tr>
                    <tr>
                        
                        <th id='th1'>From</th>                        
                        <th id='th1'>To</th> 
                        <th id='th1'>Date</th>
                        <th id='th1'>Time</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                        include_once('phpConnect.php');
                        $querylec=" select from_id,to_id,date,time from chat";
                        $resultlec=mysqli_query($connection,$querylec);
                    
                        while($rows2=mysqli_fetch_assoc($resultlec)){
                            echo "<tr id='tr1'>";
                                echo "<td>";
                                    echo $rows2['from_id'];
                                echo "</td>";
                                echo "<td>";
                                    $fname=$rows2['to_id'];
                                    echo $fname;
                                echo "</td>";
                                
                                echo "<td>";
                                    echo $rows2['date'];
                                echo "</td>";
                                
                                echo "<td>";
                                    echo $rows2['time'];
                                echo "</td>";
                            echo "</tr>";
                            
                        }
                        ?>
                        <?php
                            if(isset($_POST['clearall'])){
                            include_once('phpConnect.php');
                            $querysub="delete from chat";
                            $resultsub=mysqli_query($connection,$querysub);
                                echo "<script>alert('Messages Cleared Successfully')</script>";
                                echo "<script>window.location.assign('adminWindow.php');</script>";
                            }
                        ?>
                        </tbody>
                    </table>
                </center>

        </div>
        <script>
            $(document).ready(function(){
                $('.h21').click(function(){

                    $('.tb1').toggle();

                });

            });
            $(document).ready(function(){
                $('.h22').click(function(){

                    $('.tb2').toggle();

                });

            });
            $(document).ready(function(){
                $('.h23').click(function(){

                    $('.tb3').toggle();

                });

            });
            $(document).ready(function(){
                $('.h24').click(function(){

                    $('.tb4').toggle();

                });

            });
            $(document).ready(function(){
                $('.h25').click(function(){

                    $('.tb5').toggle();

                });

            });

        </script>
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
