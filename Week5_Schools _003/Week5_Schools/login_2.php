<?php
        session_start();

        //receive values from other page
        $username = $_GET['userName'];
        $password = $_GET['password'];

        //echo to confirm values
        //echo ("<h3>User Name: " . $username . "<br>" . "Password: " . $password . "</h3>");

/* 
 * 
 * 
 * [user1:pass1]
 * 
 * 
 * 
(x) login.php allows the user to login by providing a username and password.
(x) The password must be encrypted in the user table.
(x) Upon logging in the user is taken to the upload.php page.
 */

        //include outside files
        include './dbconnect.php';
        include './functions.php';

        //db connection
        $db = getDatabase();

       //SQL statement
        $stmt = $db->prepare("SELECT * FROM users WHERE user = :username AND passkey = :password");
        //$stmt = $db->prepare("SELECT * FROM users WHERE user = '".$username."' AND passkey = '".SHA1($password)."' ");
        //$stmt = $db->prepare("SELECT * FROM users WHERE user = '".$username."' AND passkey = '".$password."' ");
        //$stmt = $db->prepare("SELECT * FROM users");    
           
        $binds = array(
        ":username" => $username,
        ":password" => SHA1($password)
        );
    
        echo "status of (login): ";
        //var_dump($_SESSION);
             
        //execute SQL
        $results = array();
        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0)
        {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            echo "<h1 style='color:green'>logged in</h1>";
            
            //if query returns any rows, set session variable to "true"
            $_SESSION["login"] = "true";
            
            //var_dump($_SESSION);
            
            //redirect to upload page
            
            header("location:upload.php");
            die();
        }                         
        else
        {
            //if query returns 0 rows, do nothing
            //echo "<h1 style='color:red'>Failed to login...</h1><br><br>";
            //echo "<a class='btn btn-warning' href='login_1.php'>Back to Login Page</a>";
            $_SESSION["loginError"] = "<h5 style='color:red'>Oops, incorrect login</h5>";
            header("location:login_1.php");
            die();
        }

?>
      
  <br>
  <br>
  <br>
  <br>
  <!-- test output of users table 
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>  
      
            <?php  //foreach ($results as $row) { ?>
                <tr>
                    <td><?php //echo $row['user']; ?></td>
                    <td><?php //echo $row['passkey']; ?></td>
                </tr>
            <?php //}  ?>
  -->
  </body>
</html>

