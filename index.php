<!DOCTYPE HTML>

<html>
    <head>
        <title>Login Form</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width , initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <link href="css/global.css" type="text/css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            function checkMe(){
                var name=document.getElementById("userid").value;
                var pw=document.getElementById("pw").value;
                console.log(name);
                if(name==""){
                        alert("Please enter the User name");
                        return false;
                   }
                if(pw==""){
                        alert("Please enter the Password");
                        return false;
                   }
            }
            </script>
        
    </head>
    <body class="bc">
        <div class="container-fluid background">
            
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <img src="animations/lap.gif" style="padding-top:170px; padding-left:950px;"> 
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <form class="form-container" method="post" id="myform" name="myform" action="phpUser.php" onsubmit="return checkMe()" style="border-radius:20px;">
                        <h1 class="head1">LOGIN FORM</h1>
                      <div class="form-group">
                        <label for="exampleInputName">User Name</label>
                        <input type="text" class="form-control" placeholder="User Name" name="user" id="userid">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control"  placeholder="Password" name="password" id="pw">
                      </div>
                      
                      <div class="checkbox">
                        <center><label>
                          <input type="checkbox">Remember me
                            </label></center>
                      </div>
                      <button type="submit" class="btn btn-success btn-block" name="login" >login</button>


                    </form>
                   
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12"></div>
                </div>
        </div> 
        
    </body>
</html>