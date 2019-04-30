<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
        body
        {
            margin:auto;
            width: 80%;
            padding:45px;
        }
        
        #scrollDownBtn
        {
            position:fixed;
            bottom: 20px;
            right: 10px;
            border-radius: 0px 0px 10px 10px;
            
        }
        
        #scrollUpBtn
        {
            position:fixed;
            margin-left:100px;    
            right: 10px;
            bottom: 54px;
            border-radius: 10px 10px 0px 0px;
            width: 134px;
        }
        
        #scrollBtns
        {
            postion:fixed;
            z-index: 2;
        }       
  </style>
  </head>
  <body>
    
<h2>Testing Search</h2>
<hr>
<br>

        <?php
        //include outside files
        include './dbconnect.php';
        include './functions.php';

        //testing column name + search word
        //$column = 'schoolName';
        //$searchWord = 'test';
        
        //receive variables from other page
        $searchWord = $_GET["searchValue"];
        $column = $_GET["dropDownValue"];
        
        
        //returnSearch($searchWord, $column);

 
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

<h3>Word/Value being searched for: <u><?php echo $searchWord ?></u></h3>
<?php /*var_dump($searchWord);*/ ?>
<br>
<h3>Column being searched for: <u><?php echo $column ?></u></h3>
<?php /*var_dump($column);*/ ?>
<br>
<br>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>School Name</th>
                    <th>City</th>
                    <th>Abbreviation</th>                
                </tr>
            </thead>
            <tbody>  
                          
            <?php foreach (returnSearch($searchWord, $column) as $row) { ?>
                <tr>
                    <td><?php //echo $row['id']; ?></td>
                    <td><?php echo $row['schoolName']; ?></td>
                    <td><?php echo $row['city']; ?></td>
                    <td><?php echo $row['abbreviation']; ?></td>   
                </tr>
            <?php } ?>
            
            </tbody>
        </table> 

    </body>
</html>