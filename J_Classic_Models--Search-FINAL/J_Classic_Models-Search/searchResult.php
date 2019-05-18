<html>
<head>
 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
      h3, h4
      {
          display:inline;
      }
  </style>
</head>
<body>
    
<?php

//only include selects, because selects includes dbconnect
include 'selects.php'; 

//recieve variable from other page
//$searchWord = $_GET["searchValueCustomers"];

?>
    
<div class="container">

  <div class="page-header">
      <h1><b>Search Results</b></h1>      
  </div>


<?php //echo "<h3>Word/Value being searched for: <u><h4 style='color:green'>$searchWord</h4></u></h3><br>"; ?>


<?php

// if/else if's to determine which search function to use

if($_REQUEST['submit']=="Search Customers")
{
    $searchWord = $_GET["searchValueCustomers"];
    echo "<h3>Customer being searched for: <u><h3 style='color:green'>$searchWord</h3></u></h3><br>";
    //print "search for customers";
    $result = returnCustomerSearch($searchWord);
    //var_dump ($result);
    displayTable ($result);
}

else if($_REQUEST['submit']=="Search Employees")
{
    $searchWord = $_GET["searchValueEmployees"];
    echo "<h3>First/Last Name being searched for: <u><h3 style='color:green'>$searchWord</h3></u></h3><br>";
    $result = returnEmployeeSearch($searchWord);
    //var_dump ($result);
    displayTable ($result);
}

else if($_REQUEST['submit']=="Search Products")
{
    $searchWord = $_GET["searchValueProducts"];
    echo "<h3>Product being searched for: <u><h3 style='color:green'>$searchWord</h3></u></h3><br>";
    $result = returnProductSearch($searchWord);
    //var_dump ($result);
    displayTable ($result);
}

else if($_REQUEST['submit']=="Search Product Line")
{
    $searchWord = $_GET["searchValueProductsLine"];
    echo "<h3>Product Line being searched for: <u><h3 style='color:green'>$searchWord</h3></u></h3><br>";
    $result = returnProductLineSearch($searchWord);
    //var_dump ($result);
    displayTable ($result);
}

else if($_REQUEST['submit']=="Search Orders")
{
    $searchWord = $_GET["searchValueOrders"];
    echo "<h3>Order Status being searched for: <u><h3 style='color:green'>$searchWord</h3></u></h3><br>";
    $result = returnOrdersSearch($searchWord);
    //var_dump ($result);
    displayTable ($result);
}

else if($_REQUEST['submit']=="Search Order Date")
{
    $searchWord1 = $_GET["searchValueOrdersDate1"];
    $searchWord2 = $_GET["searchValueOrdersDate2"];
    echo "<h3>Searching for Orders between: <u><h3 style='color:green'>$searchWord1</h3></u></h3>&nbsp;";
    echo "<h3>and <u><h3 style='color:green'>$searchWord2</h3></u></h3><br>";

    $result = returnOrdersDateSearch($searchWord1, $searchWord2);
    //var_dump ($result);
    displayTable ($result);
}



?>

</div>

</body>
</html>
