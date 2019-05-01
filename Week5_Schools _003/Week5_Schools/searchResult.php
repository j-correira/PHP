<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Search Results</title>
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
            margin-top: 30px;
        }
        
        h1
        {
            font-size: 36px;
            margin-left: 65px;
            margin-top: 25px;
        }
        
        h4
        {
            font-size: 32px;
            display: inline;
        }
        
        .form-group
        {
            margin-bottom: 15px;
            margin-right: 15px;
        }   
  </style>
  </head>
  <body>
    
<h1>Search Results</h1>
<hr>
<br>

        <?php
        
        session_start();
        
        //check if user is logged in
        if (isset($_SESSION["login"]))
        {
            //do nothing, successfully logged in
            //echo "<h1 style='color:green'>Successful login!</h1>";
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
        
        //receive variables from other page
        $searchWord = $_GET["searchValue"];
        $column = $_GET["dropDownValue"];
        
        //db connection
        $db = getDatabase();

        //SQL statement
        $stmt = $db->prepare("SELECT * FROM schools WHERE $column LIKE :search");
        //WORKING--- $stmt = $db->prepare("SELECT * FROM corps WHERE corp LIKE '%test%'");
      
        //search word = wildcard
        $search = '%'.$searchWord.'%';
        
        $binds = array(
        ":search" => $search 
        );

        //execute SQL
        $results = array();
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    
     
        ?>


<div id="container">
    <div id="center">

<h3>Word/Value being searched for: <u><?php echo"<h4 style='color:green'>$searchWord</h4>" ?></u></h3>
<?php /*var_dump($searchWord);*/ ?>
<h3>Column being searched for: <u><?php echo"<h4 style='color:green'>$column</h4>" ?></u></h3>
<?php /*var_dump($column);*/ ?>
<br>
<a href="search.php" class="btn btn-info">Go back to Search</a>
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
                          
            <?php foreach (returnSearch($searchWord, $column) as $row) { ?>
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