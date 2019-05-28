<?php

include './header.php';
include './dbconnect.php';
include './functions.php';


$db = getDatabase();
    
        $population = "";
        $size = "";

        if ( isPostRequest() ){
            
            $id = filter_input(INPUT_POST, 'id');
            
            $population = filter_input(INPUT_POST, 'population');
            $size = filter_input(INPUT_POST, 'size');

                                   
            $stmt = $db->prepare("UPDATE se266_001248229.countrydetails SET CountryPopulation = :population, CountrySize = :size WHERE CountryDetailID = :id");
            
            $binds = array(
                ":id" => $id,
                ":population" => $population,
                ":size" => $size,

            );
            
            $message = 'Update failed';
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
               $message = '<strong>Update Complete!</strong>';
            }
            
          } 
          
          else {
            $id = filter_input(INPUT_GET, 'id');
        }
        
        $stmt = $db->prepare("SELECT * FROM se266_001248229.countrydetails where CountryDetailID = :id");
        
        $binds = array(
             ":id" => $id
         );
        
         $result = array();
         
         
         if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $population = $result['CountryPopulation'];
            $size = $result['CountrySize'];

         } else {
             header('Location: update.php');
             die('ID not found');            
         }
        
         
         //get id from url
        //$id = $_GET['id']
        ?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
      #idResult
      {
          width:100px;
      }
      
  </style>
</head>
<body>

<div class="container">
    

    
        <div id ="idResult">
            <h4>id = <?php echo $id ?></h4>
        </div>
    
    
        <form method="post" action="#">            
            Country Population <input type="text" id='formBox' class="form-control" value="<?php echo $population ?>" name="population" />
            <br />
            Country Size <input type="text" id='formBox' class="form-control" value="<?php echo $size ?>" name="size" />
            <br />           
            <input type="hidden" name="id" value="<?php echo $id ?>" />
            <input type="submit" class="btn btn-info" id="submitBtn" value="Update" />
        </form>
        <br>
        <br>
        <br>
        <h4><?php if ( isset($message) ) { echo $message; } ?></h4>
    
</div><!-- /container -->


</body>
</html>