<html>
    <head>
        <link href="css/window.css" type="text/css" rel="stylesheet">
        <title>Admin Student</title>
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
                    <li class="nav-item"><a href="" class="nav-link  active">Students</a></li>
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
                    width:400px;
                    height: auto;
                    margin: 50px auto;
                    text-align: left;
                    padding: 50px;
                    border: 1px solid #bbbbbb;
                    border-radius: 5px;
                    
                }
                       
            </style>";
        ?>
        
            <table class='tbl1' id='tableone'>
                <thead>
                    <tr class='trtop'>
                        <th id='th1'>Student ID</th>
                        <th id='th1'>First Name</th>
                        <th id='th1'>Last Name</th>
                        <th id='th1'>Age</th>
                        <th id='th1'>Gender</th>
                        <th id='th1'>Date of Birth</th>
                        <th id='th1'>Contact No</th>
                        <th id='th1'>Email</th>
                        <th id='th1'>Address</th>
                        <th id='th1'>Department</th>   
                          
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                        include_once('phpConnect.php');
                        $querystu=" select * from student";
                        $resultstu=mysqli_query($connection,$querystu);
                    
                        while($rows2=mysqli_fetch_assoc($resultstu)){
                            echo "<tr id='tr1' '>";
                                echo "<td id='st'>";
                                    echo $rows2['st_id'];
                                echo "</td>";
                                echo "<td>";
                                    $fname=$rows2['fname'];
                                    echo $fname;
                                echo "</td>";
                                echo "<td>";
                                    echo $rows2['lname'];
                                echo "</td>";
                                echo "<td>";
                                    echo $rows2['age'];
                                echo "</td>";
                                echo "<td>";
                                    echo $rows2['gender'];
                                echo "</td>";
                                echo "<td>";
                                    echo $rows2['DOB'];
                                echo "</td>";
                                echo "<td>";
                                    echo $rows2['contact_no'];
                                echo "</td>";
                                echo "<td>";
                                    echo $rows2['email'];
                                echo "</td>";
                                echo "<td>";
                                    echo $rows2['address'];
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
                     
                        <form method='post' action='' class='fmuser' onsubmit="checkForm()" name='myForm'>
                            <h3>Add Student Details</h3> 
                        <table border='0' class="tbl2" id='tablestu'>
                        <div class='input-group'>
                        <tr id='tr2'>
                            <td>
                                <label>User ID</label>
                            </td>
                            <td>
                                <input type='text' name='userName' placeholder='Enter User ID' id='st_id' required>
                            </td>  
                        </tr>
                            <tr id='tr2'>
                            <td>
                                <label>First Name</label>
                            </td>
                            <td>
                                <input type='text' name='fName' placeholder='First Name' id='fname' required>
                            </td>
                        </tr>
                        <tr id='tr2'>
                            <td>
                                <label>Last Name</label>
                            </td>
                            <td>
                                <input type='text' name='lName' placeholder='Last Name' id='lname' required>
                            </td> 
                        </tr>
                        <tr id='tr2'>
                            <td>
                                <label>Gender</label>
                            </td>
                            <td>
                                <input type='radio' name='gen' value='Male' checked>&nbsp;Male   &nbsp;&nbsp;                             
                                <input type='radio' name='gen' value='Female'>&nbsp;Female  
                            </td>
                        </tr>
                        <tr id='tr2'>
                            <td>
                                <label>Address</label>
                            </td>
                            <td>
                                <input type='text' name='address' placeholder='Enter Address' id='address' required>
                            </td>
                        </tr>  
                        <tr id='tr2'>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type='text' name='email' placeholder='Enter Email Address' id='email' required>
                            </td>
                        </tr>
                        <tr id='tr2'>
                            <td>
                                <label>Contact No.</label>
                            </td>
                            <td>
                                <input type='text' name='tpno' placeholder='070...' id='tp' maxlength='10' required>
                            </td>
                        </tr>
                        <tr id='tr2'>
                            <td>
                                <label>Department ID</label>
                            </td>
                            <td>
                                <select name='dep' style='width:180px;'>
                                    <option  value='ICT' selected>ICT</option>
                                    <option  value='ET'>ET</option>
                                    <option  value='BST'>BST</option>
                                </select>
                            </td>
                        </tr>
                        <tr id='tr2'>
                            <td>
                                <label>Date of Birth</label>
                            </td>
                            <td>
                                <input type='date' name='dob' style='width:182px;' id='dob' required>
                            </td>
                        </tr>    
                        </div>
                        <div class='input-group'>
                        <tr id='tr2'>
                            <td>
                                <label>Password</label>
                            </td>
                            <td>
                                <input  type='password' name='passw1'  id='pass1' required>
                            </td>
                        </tr>
                        </div>
                        <div class='input-group'>
                        <tr id='tr2'>
                            <td>
                                <label>Re-enter Password</label>
                            </td>
                            <td>
                                <input type='password' name='passw2'  id='pass2'  required>
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
                          <h3>Delete Student Details</h3>  
                        <table border='0' class="tbl2">
                        <div class='input-group'>
                        <tr id='tr2'>
                            <td>
                                <label>User ID</label>
                            </td>
                            <td style="padding-left:30px;">
                                <input type='text' name='userName' id="user_id" placeholder='Enter User ID' required>
                            </td>
                        </tr>
                            <tr>
                                 <td id='td2' >
                               <center> <button type='submit' name='delete' class='btn' style="background:red;">Delete</button> </center>
                            </td>
                            <td id='td2'>
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
                        
                        $un=$_POST['userName'];
                        $fn=$_POST['fName'];
                        $ln=$_POST['lName'];
                        $today=date('Y-m-d');
                        $dob=$_POST['dob'];
                        $age=$today-$dob;
                        $gen=$_POST['gen'];
                        $add=$_POST['address'];
                        $email=$_POST['email'];
                        $tp=$_POST['tpno'];
                        $dep=$_POST['dep'];
                        $post=$_POST['post'];
                        $pass;
                        if($_POST['passw1']==$_POST['passw2']){
                            $pass=$_POST['passw1'];
                            echo "<script>
                            function checkForm(){
                            var stid=document.getElementById('st_id').value;
                            var p=/^[TG]$/;
                            if(stid!=p){
                                alert('Wrong Student ID');
                                return false;
                            }else{";
                                $queryinsertuser="insert into users values('$un','$pass','$post')";
                                $queryinsert="insert into student (st_id,fname,lname,age,gender,address,email,contact_no,dep_id,DOB)  values('$un','$fn','$ln','$age','$gen','$add','$email','$tp','$dep','$dob')";
                                mysqli_query($connection,$queryinsertuser);
                                mysqli_query($connection,$queryinsert);
                                echo"<script>alert('The Student Data Not Added Successfullty');</script>"; 
                                echo "<script>window.location.assign('adminStudents.php');</script>";
                            echo"}</script> ";
                    
                        }
                    
                                
                    }

                    ?>
                <?php
                    if(isset($_POST['update'])){
                        $un=$_POST['userName'];
                        $un=$_POST['userName'];
                        $fn=$_POST['fName'];
                        $ln=$_POST['lName'];
                        $today=date('Y-m-d');
                        $dob=$_POST['dob'];
                        $age=$today-$dob;
                        $gen=$_POST['gen'];
                        $add=$_POST['address'];
                        $email=$_POST['email'];
                        $tp=$_POST['tpno'];
                        $dep=$_POST['dep'];
                        $post=$_POST['post'];
                        
                        $pass;
                        if($_POST['passw1']==$_POST['passw2']){
                            $pass=$_POST['passw1'];
                            
                            $queryupdatestudent="update student set fname='$fn',lname='$ln',age='$age',gender='$gen',address='$add',email='$email',contact_no='$tp',dep_id='$dep',DOB='$dob' where st_id='$un'";
                            
                            
                            mysqli_query($connection,$queryupdatestudent);
                            echo "<script>alert('The Student Updated Successfullty');</script>";
                          
                            
                        }else{
                            echo "<script>window.location.assign('adminStudents.php');</script>";
                            
                           
                           
                        }
                    }
                    if(isset($_POST['delete'])){
                        $un=$_POST['userName'];
                        
                       
                            $querydel="delete from users where user_name='$un'";
                            $querydelstu="delete from student where st_id='$un'";
                            mysqli_query($connection,$querydel);
                            mysqli_query($connection,$querydelstu);
                            echo "<script>alert('The Student Deleted Successfullty');</script>";
                            echo "<script>window.location.assign('adminStudents.php');</script>";
                            
                        }
                    
                    ?>
            
       <script>
                function checkForm(){
                    var stid=document.getElementById("st_id").value;
                    var fname=document.getElementById("fname").value;
                    var lname=document.getElementById("lname").value;
                    var address=document.getElementById("address").value;
                    var email=document.getElementById("email").value;
                    var tp=document.getElementById("tp").value;
                    
                    var p=/^[TG][0-9](3)/;
                    if(stid==""){
                        alert("Wrong Student ID");
                        return false;
                    }else{
                         
                    }
                    if(fname==""){
                        alert("Enter First Name");
                        return false;
                    }
                    if(lname==""){
                        alert("Enter Last Name");
                        return false;
                    }
                    if(address==""){
                        alert("Enter Address");
                        return false;
                    }
                    if(email==""){
                        alert("Enter Email");
                        return false;
                    }
                    if(tp==""){
                        alert("Enter Contact No");
                        return false;
                    }
                    
                    var validPwd;
                    var passV=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
                    if(document.myForm.passw1.value.match(passV)){
                        if(document.myForm.passw1.value!=document.myForm.passw2.value){
                            alert("Passwords are not matching");
                            document.myForm.passw1.focus();
                            document.myForm.passw1.select();
                            return validPwd=false;
                        }else{
                            alert("Passwords are matching");
                            return validPwd=true;
                        }  
                    }else{
                        alert("Wrong");
                    }
                     
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
