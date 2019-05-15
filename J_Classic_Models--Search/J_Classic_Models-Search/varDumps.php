<!DOCTYPE html>
<?php include ('selects.php'); ?>

<html>
<head>
 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
  <style>
    .btn-info
    {
        color: #fff;
        background-color: #5bc0de;
        border-color: #46b8da;
        margin-right: 15px;
    }
    
    #btnsLeft
    {

        width: 490px;
        float: left;
        margin-right: 25px;

    }
    
    #btnsRight
    {
        width:420px;
        float:left;
    }
    </style>  
    
</head>
<body>

<div class="container">

  <div class="page-header">
      <h1><b>Var_Dumps</b> for Classic Models Select Statements</h1>      
  </div>
    
<!-- <div id="btnsLeft"> -->
  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo1">Customers</button>
  <div div id="demo1" class="collapse">
      
      <br>
    <form id="searchCustomerForm" action="searchResult.php" method="get">   
        <input name="searchValueCustomers" type="search" placeholder="Customer Name" class="form-control" style="width:145px; display: inline;" />  
        &nbsp;&nbsp;<input type="submit" class="btn btn-success" href="searchResult.php" name="submit" value="Search Customers">  
        </fieldset>
    </form>
    <br>
   
    <?php $result = listCustomers ();
    var_dump ($result);
    //displayTable ($result); ?>
  </div>

      
  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo2">Employees</button>
  <div div id="demo2" class="collapse">
      
    <br>
    <form id="searchEmployeesForm" action="searchResult.php" method="get">   
        <input name="searchValueEmployees" type="search" placeholder="Employee Name" class="form-control" style="width:175px; display: inline;" />
        &nbsp;&nbsp;<input type="submit" class="btn btn-success" href="searchResult.php" name="submit" value="Search Employees">  
        </fieldset>
    </form>
    <br> 
     
    <?php $result = listEmployees ();
    var_dump ($result);
    //displayTable ($result); ?>
  </div>
 
      
  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo3">Products</button>
  <div div id="demo3" class="collapse">
      
    <br>
    <form id="searchProductsForm" action="searchResult.php" method="get">   
        <input name="searchValueProducts" type="search" placeholder="Product Name" class="form-control" style="width:175px; display: inline;" />
        &nbsp;&nbsp;<input type="submit" class="btn btn-success" href="searchResult.php" name="submit" value="Search Products">  
        </fieldset>
    </form>
    <br>         
      
    <?php $result = listProducts ();
    var_dump ($result);
    //displayTable ($result); ?>
  </div>
  
        
  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo4">Orders</button>
  <div div id="demo4" class="collapse">
      
    <br>
    <form id="searchProductsForm" action="searchResult.php" method="get">   
        <input name="searchValueOrders" type="search" placeholder="Order Status" class="form-control" style="width:175px; display: inline;" />
        &nbsp;&nbsp;<input type="submit" class="btn btn-success" href="searchResult.php" name="submit" value="Search Orders">  
        </fieldset>
    </form>
    <br>
      
    <?php $result = listOrders ();
    var_dump ($result);
    //displayTable ($result); ?>
  </div>
  
<!-- </div> /btnsLeft --> 


<!-- <div id="btnsRight"> -->
  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo5">Top Customers</button>
  <div div id="demo5" class="collapse">
    <br>
    <?php $result = listTopCustomers ();
    var_dump ($result);
    //displayTable ($result); ?>
  </div>

            
  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo6">Useless Customers</button>
  <div div id="demo6" class="collapse">
    <br>
    <?php $result = listUselessCustomers ();
    var_dump ($result);
    //displayTable ($result); ?>
  </div>

              
  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo7">Customers & Countries</button>
  <div div id="demo7" class="collapse">
    <br>
    <?php $result = listCustomersByCountry ();
    var_dump ($result);
    //displayTable ($result); ?>
  </div>
  
<!-- </div> /btnsRight -->
  
</div><!-- /container -->




</body>
</html>

<?php

    
/*  -testing outputs
 * 
 * 
    echo ("<h3>#1 Customers</h3>");
    $result = listCustomers ();
    var_dump ($result);
    //displayTable ($result);
    
    echo ("<h3>#2 Employees</h3>");
    $result = listEmployees ();
    //var_dump ($result);
    //displayTable ($result);
    
    echo ("<h3>#3 Products</h3>");
    $result = listProducts();
    //var_dump ($result);
    //displayTable ($result);
    
    echo ("<h3>#4 Orders</h3>");
    $result = listOrders();
    //var_dump ($result);
    //displayTable ($result);
    
    echo ("<h3>#5 Top Customers</h3>");
    $result = listTopCustomers();
    //var_dump ($result);
    //displayTable ($result);
    
    echo ("<h3>#6 Useless Customers</h3>");
    $result = listUselessCustomers();
    //var_dump ($result);
    //displayTable ($result);
    
    echo ("<h3>#7 Customers By Country</h3>");
    $result = listCustomersByCountry();
    //var_dump ($result);
    //displayTable ($result);
*/
?>

