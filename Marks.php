<html>
    <head>
        <link href="css/window.css" type="text/css" rel="stylesheet">
        <title>Student</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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
                    <li class="nav-item"><a a href="studentNote.php" class="nav-link" >Subject</a></li>
                    <li class="nav-item"><a href="" class="nav-item nav-link active">Marks</a></li>
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
                
                    <marquee style="border-bottom-style:inset;border-top-style:inset;color:#fff;">Welcome to Student Management System</marquee>  
         <?php
           
            
        echo "<style>
                td {
                    transition: all 200ms;
                }
                #tr2{
                    border-bottom: 1px solid #cbcbcb;
                    color:white;
                    font-weight:bold;
                    height:15px;
                    
                }
                #th1{
                    color:white;
                }
               
                #ths,#tds{
                    border:none;
                    height: 60px;
                    padding: 5px;
                    
                }
                #tds{
                    text-align: center;
                }
                
               
                #tr2:hover{
                    background:  rgba(0,0,0, 0.4);
                    color:white;
                    
                }
                
               
                
                .gpadiv{
                filter: blur(4px);
                -webkit-filter: blur(4px);
                height:220px;
                width:340px;
                border: 5px outset black;
                  background-color: transperant;    
                  text-align: center;
                }
                h3{
                    font-family: pristona;
                    font-weight:bold;
                    font-style:italic;
                }
                .textgpa {
                      
                      background-color: rgba(0,0,0, 0.4); 
                      color: white;
                      font-weight: bold;
                      border: 3px solid #f1f1f1;
                      position: absolute;
                      top: 32%;
                      left: 87.2%;
                      transform: translate(-50%, -50%);
                      z-index: 2;
                      width: 20%;
                      padding: 20px;
                      text-align: center;
                        }       
               
                       
            </style>";
        ?>
                                   
                    <table style="color:#fff;font-size: 20px;border-spacing: 15px;"  cellpadding='30px'> 
                     <?php
                        
                            echo "<tr>";
                                echo  "<th id='ths'><center>Subect Name</center></th>";
                                echo  "<td id='tds'>Assignment</td>";
                                echo  "<td  id='tds'>Quiz</td>";
                                echo  "<td  id='tds'>Mid</td>";
                                echo  "<td  id='tds'>Final</td>";
                                echo "<td id='tds'>Total Marks</td>";
                                echo "<td id='tds'>Grade</td>";
                                echo "</tr>";
                        $sub_name;
                            include_once('phpConnect.php');
                            $username =$_SESSION['user'];
                            //$query1="select sub_name from subject where st_id in(select st_id from marks where st_id='$username')";
                            $query1="select subject.sub_name,marks.Assignment,marks.Mid,marks.Final,marks.Quiz,(Assignment+mid+Final+Quiz) as total,case  when quiz+mid+assignment+final>=75 then 'A' when quiz+mid+assignment+final>=65 then 'B' when quiz+mid+assignment+final>=55 then 'C' when quiz+mid+assignment+final>=35 then 'S' when quiz+mid+assignment+final<35 then 'W' end as Grade from marks inner join subject where subject.sub_id=marks.sub_id and st_id='$username'";
                            $result1=mysqli_query($connection,$query1);
                            while($rows=mysqli_fetch_assoc($result1)){
                                
                                
                                $sub_name= $rows['sub_name'];
                                $assign= $rows['Assignment'];
                                $mid= $rows['Mid'];
                                $final= $rows['Final'];
                                $quiz= $rows['Quiz'];
                                $total= $rows['total'];
                                $grade= $rows['Grade'];
                                
                                echo "<tr id='tr2'>";
                                echo  "<th>$sub_name</th>";
                                echo  "<td>$assign</td>";
                                echo  "<td>$quiz</td>";
                                echo  "<td>$mid</td>";
                                echo  "<td>$final</td>";
                                echo  "<td>$total</td>";
                                echo  "<td>$grade</td>";
                                echo "</tr>";
                            }
                        ?>
                         
                    </table>
                    
                     
                        
                        
                        <?php
                            include_once('phpConnect.php');
                            $username =$_SESSION['user'];
                            $query1=" select sum(Grade)/count(sub_id) as gpa from grade where st_id='$username'";
                            $result1=mysqli_query($connection,$query1);
                            $rows=mysqli_fetch_assoc($result1);
                              
                              $ln= $rows['gpa'];  
                              
                        ?>
                        
                <div class='gpadiv'></div>
                           <br>
                           <br>
                           
                           
                           <p>
                               <div class='textgpa'>
                                   <h3>Your GPA</h3>
                           <h2><?php echo "$ln"; ?></h2>
                           </div>
            </div>
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
  