

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        
        <style>
        #container
        {
            margin:auto;
            width:85%;
        }
        
        #center
        {
            margin: auto;
            width: 177px;
            border: 2px solid #DCDCDC;
            border-radius: 8px;
            padding-bottom: 30px;
            padding-left: 16px;
            padding-top: 13px;
            margin-top: 70px;
        }
        
        input
        {
            line-height: normal;
            margin-bottom: 5px;
        }
        
        .form-control
        {
            width: 137px;
        }
        
        .btn-success
        {
            width: 136px;
            color: #fff;
            background-color: #5cb85c;
            border-color: #4cae4c;
        }
        </style>
        
  </head>
  <body>

<div id="container">
    <form method="GET" action="login_2.php">
        <div id="center">
            <h1>Login</h1>
            <div>
                <input type="text" class="form-control" required="true" name="userName" value="user1" placeholder="Username: user1" />
            </div>
            <div>
                <input type="password" required="true" class="form-control" name="password" placeholder="Password: pass1"/>
            </div>
            <div>
                <input type="submit" value="Submit" name="but_submit" class="btn btn-success" id="but_submit" />
                <?php 
                        session_start();
                        //check for error message, echo if found
                        if (isset($_SESSION['loginError']))
                        {
                            echo $_SESSION['loginError'];
                            unset($_SESSION['loginError']);
                        }
                ?>
            </div>
        </div>
    </form>
</div>
      
      
  
  </body>
</html>


