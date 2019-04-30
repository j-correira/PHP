

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>J - Viewing Corporations</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        
        <style>
            
        </style>
        
  </head>
  <body>
  
<div class="container">
    <form method="GET" action="">
        <div id="div_login">
            <h1>Login</h1>
            <div>
                <input type="text" class="textbox" id="txt_uname" name="userName" placeholder="Username" />
            </div>
            <div>
                <input type="password" class="textbox" id="txt_uname" name="password" placeholder="Password"/>
            </div>
            <div>
                <input type="submit" value="Submit" name="but_submit" id="but_submit" />
                <?php 
                        $username = $_GET['userName'];
                        $password = $_GET['password'];
                ?>
            </div>
        </div>
    </form>
</div>
      
      
<?php

/* 
 * 
 * 
 * kinda wokring.....       [user1:pass1]
 * 
 * fix session var err 
 * 
(-) login.php allows the user to login by providing a username and password.
(-) The password must be encrypted in the user table.
(-) Upon logging in the user is taken to the upload.php page.
 */

session_start();


//include outside files
include './dbconnect.php';
include './functions.php';

        //if (isset($_POST['username']) and isset($_POST['password'])){
    
        


        
        
        
        //$username = $_POST['userName'];
        //$password = $_POST['password'];

        //db connection
        $db = getDatabase();

       //SQL statement
        $stmt = $db->prepare("SELECT * FROM users WHERE user = :username AND passkey = :password");
        //$stmt = $db->prepare("SELECT * FROM users WHERE user = '".$username."' AND passkey = '".SHA1($password)."' ");
        //$stmt = $db->prepare("SELECT * FROM users WHERE user = '".$username."' AND passkey = '".$password."' ");
        //$stmt = $db->prepare("SELECT * FROM users");
        
        //echo $num_rows . "= Number of Rows";
        
    
        $binds = array(
        ":username" => $username,
        ":password" => SHA1($password)
        );
    
        echo "status of (login): ";
        var_dump($_SESSION);
        
        
        //execute SQL
        $results = array();
        

        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0)
        {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            echo "<h1 style='color:green'>logged in</h1>";
            
            $_SESSION["login"] = "set";
            
            var_dump($_SESSION);
            
            header("location:upload.php");
            die();
        }                         
        else
        {
            //echo "<h1 style='color:red'>Failed to login...</h1>";
            //$_SESSION["login"] = "no";
        }
        
        



?>
      
      
      <?php
      

      
      ?>
      
  <br>
  <br>
  <br>
  <br>
  <!-- test output of users table -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>  
      
            <?php  foreach ($results as $row) { ?>
                <tr>
                    <td><?php echo $row['user']; ?></td>
                    <td><?php echo $row['passkey']; ?></td>
                </tr>
            <?php }  ?>

  
  </body>
</html>


