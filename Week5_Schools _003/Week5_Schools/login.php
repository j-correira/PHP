<?php

/* 
(-) login.php allows the user to login by providing a username and password.
(-) The password must be encrypted in the user table.
(-) Upon logging in the user is taken to the upload.php page.
 */

session_start();

//include outside files
include './dbconnect.php';
include './functions.php';

//if (isset($_POST['username']) and isset($_POST['password'])){
    
//$username = $_POST['username'];
//$password = $_POST['password'];


        //db connection
        $db = getDatabase();

       //SQL statement
        $stmt = $db->prepare("SELECT * FROM users");
        
        //echo $num_rows . "= Number of Rows";
        
        //execute SQL
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            //$num_rows = mysqli_num_rows($results);
        }

?>
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
  
      <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Please Login</h2>
        <div class="input-group">
	  <span class="input-group-addon" id="basic-addon1">@</span>
	  <input type="text" name="username" class="form-control" placeholder="Username" required>
	</div>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <a class="btn btn-lg btn-primary btn-block" href="register.php">Register</a>
      </form>
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