<html>
<head>
 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body>
    
<?php

//only include selects, because selects includes dbconnect
include 'selects.php'; 

//recieve variable from other page
$searchWord = $_GET["searchValueCustomers"];
?>
    
<div class="container">

  <div class="page-header">
      <h1><b>Search Results</b></h1>      
  </div>


<h3>Word/Value being searched for: <u><?php echo"<h4 style='color:green'>$searchWord</h4>" ?></u></h3>
<br>


<?php
/*var_dump($searchWord);*/ 

$result = returnCustomerSearch($searchWord);
//$result = returnEmployeeSearch($searchWord);
//var_dump ($result);
displayTable ($result);
?>

</div>

</body>
</html>
