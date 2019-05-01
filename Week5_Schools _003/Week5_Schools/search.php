

<?php

    session_start();
    
    //check if user is logged in
    if (isset($_SESSION["login"]))
    {
        //do nothing, successfully logged in
        echo "<h1 style='color:green'>Successful login!</h1><hr>";
    }
    else
    {
        echo "<h1>get outta here</h1>";
        header("location:login_1.php");
        die();
    }
        
        //include outside files
        include './dbconnect.php';
        include './functions.php';

        //testing column name + search word
        //$column = 'schoolName';
        //$searchWord = 'test';
                
        //db connection
        $db = getDatabase();

        //SQL statement
        $stmt = $db->prepare("SELECT * FROM schools");
        //WORKING--- $stmt = $db->prepare("SELECT * FROM corps WHERE corp LIKE '%test%'");
      
        //execute SQL
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
/* 
(-) search.php allows a user to search the school table on a combination of these fields.
(x) The user is not allowed to navigate directly to upload.php or search.php.
    If the user is not logged in (check by referring to a $_SESSION variable), the user is brought back to login.php.  
 */

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Search Schools</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        
        <style>
            
        .form-control
        {
            display: inline;
        }
        
        #container
        {
            margin:auto;
            width:85%;
        }
        
        #center
        {
            margin: auto;
            width: 890px;
            border: 2px solid #DCDCDC;
            border-radius: 8px;
            padding-bottom: 30px;
            padding-left: 16px;
            padding-right: 16px;
            margin-top: 30px;
        }
        
        h1
        {
            font-size: 36px;
            margin-left: 65px;
            margin-top: 25px;
        }
        
        .form-group
        {
            margin-bottom: 15px;
            margin-right: 15px;
        }
        
        </style>
  </head>
  <body>
<div id="container">
    <div id="center">
        
        <h3>Search:</h3>       
<form id="searchForm" action="searchResult.php" method="get">
    <div class="form-group">
      <select name="dropDownValue" class="form-control" id="sort" style="width:163px;">
        <option value="" disabled selected>Select your option</option>
        <option value="schoolName">School Name</option>
        <option value="city">City</option>
        <option value="state">State</option>
      </select>
  
   &nbsp;&nbsp;<input name="searchValue" type="search" placeholder="....Search...." class="form-control" style="width:120px; display: inline;" />  
  &nbsp;&nbsp;<input type="submit" class="btn btn-success" href="searchResult.php" name="submit" value="Search">  
</fieldset>
</form>
<br>
<br>
<br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>School Name</th>
                    <th>City</th>
                    <th>State</th>                
                </tr>
            </thead>
            <tbody>  
                          
            <?php foreach ($results as $row) { ?>
                <tr>
                    <td><?php echo $row['schoolName']; ?></td>
                    <td><?php echo $row['city']; ?></td>
                    <td><?php echo $row['state']; ?></td>   
                </tr>
            <?php } ?>
            
            </tbody>
        </table> 


    </div><!-- /center -->
</div><!-- /container -->
</body>
</html>