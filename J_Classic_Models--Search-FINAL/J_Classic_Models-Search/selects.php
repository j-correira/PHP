<?php


include ('dbconnect.php');
$db =  dbconnect();  

//------------ (#1)
function listCustomers()
{
    $sql = "SELECT *
            FROM classicmodels.customers
            ORDER BY customerName";
    return (getRecords($sql));
}

function returnCustomerSearch($searchWord)
{       
    //db connection
    $db = dbconnect();

    //SQL statement
    $stmt = $db->prepare("SELECT * FROM classicmodels.customers WHERE customerName LIKE :search");
      
    //search word = wildcard
    $search = '%'.$searchWord.'%';
    
    $binds = array(
    ":search" => $search,
    );

    //execute SQL
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
        
    return $results;
}
//------------ (#1)


//------------ (#2)
function listEmployees()
{
    $sql = "SELECT  A.firstName, A.lastName, A.jobTitle, A.extension, A.email, o.city as officeLocation, 
       concat(B.firstName, ' ', B.lastName) AS 'reportsTo' 
        FROM classicmodels.employees A 
        LEFT OUTER JOIN classicmodels.employees B ON A.reportsTo=B.employeeNumber 
        INNER JOIN classicmodels.offices o on A.officecode=o.officecode 
        ORDER BY A.lastName, A.firstName;";
    return (getRecords($sql));
}

function returnEmployeeSearch($searchWord)
{       
    //db connection
    $db = dbconnect();

    //SQL statement
    $stmt = $db->prepare("SELECT * FROM classicmodels.employees WHERE concat(firstName, ' ', lastName) LIKE :search;");
      
    //search word = wildcard
    $search = '%'.$searchWord.'%';
        
    $binds = array(
    ":search" => $search,
    );

    //execute SQL
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
        
    return $results;
}
//------------ (#2)


//------------ (#3)
function listProducts()
{
    $sql = "SELECT classicmodels.products.productName, classicmodels.products.productLine, classicmodels.productlines.textDescription,
	   classicmodels.products.quantityInStock, CONCAT('$', classicmodels.products.buyPrice) AS buyPrice,
       CONCAT('$', classicmodels.products.MSRP) AS MSRP
FROM classicmodels.products
INNER JOIN classicmodels.productlines ON classicmodels.products.productLine = classicmodels.productlines.productLine
ORDER BY productLine ASC;";
    return (getRecords($sql));
}

function returnProductSearch($searchWord)
{       
    //db connection
    $db = dbconnect();

    //SQL statement
    $stmt = $db->prepare("SELECT * FROM classicmodels.products WHERE productName LIKE :search");
      
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
        
    return $results;
}

function returnProductLineSearch($searchWord)
{       
    //db connection
    $db = dbconnect();

    //SQL statement
    $stmt = $db->prepare("SELECT * FROM classicmodels.products WHERE productLine LIKE :search");
      
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
        
    return $results;
}
//------------ (#3)



//------------ (#4)
function listOrders()
{
    $sql = "SELECT classicmodels.orders.orderDate, classicmodels.orders.status, classicmodels.customers.customerName,
       classicmodels.orders.shippedDate, classicmodels.products.productName, classicmodels.products.buyPrice, 
       classicmodels.orderdetails.quantityOrdered * classicmodels.products.buyPrice AS orderTotal
       
FROM (((classicmodels.products

INNER JOIN classicmodels.orderdetails ON classicmodels.products.productCode = classicmodels.orderdetails.productCode)
INNER JOIN classicmodels.orders ON classicmodels.orderdetails.orderNumber = classicmodels.orders.orderNumber)
INNER JOIN classicmodels.customers ON classicmodels.orders.customerNumber = classicmodels.customers.customerNumber)
ORDER BY classicmodels.orders.orderDate DESC;";
    return (getRecords($sql));
}

function returnOrdersSearch($searchWord)
{       
    //db connection
    $db = dbconnect();

    //SQL statement
    $stmt = $db->prepare("SELECT * FROM classicmodels.orders WHERE status LIKE :search");
      
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
        
    return $results;
}

function returnOrdersDateSearch($searchWord1, $searchWord2)
{       
    //db connection
    $db = dbconnect();

    //SQL statement
    $stmt = $db->prepare("SELECT * FROM classicmodels.orders WHERE orderDate BETWEEN :search1 AND :search2");
      
    //search word = wildcard
    $search1 = $searchWord1;
    $search2 = $searchWord2;
        
    $binds = array(
    ":search1" => $search1,
    ":search2" => $search2
    );

    //execute SQL
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
        
    return $results;
}
//------------ (#4)



//------------ (#5)
function listTopCustomers()
{
    $sql = "SELECT CONCAT(classicmodels.customers.contactFirstName, ' ', classicmodels.customers.contactLastName) AS CustomerName,
	   classicmodels.customers.phone, classicmodels.customers.country,
       CONCAT('$', classicmodels.payments.amount) AS amountSpent, classicmodels.orders.orderDate
     
FROM ((classicmodels.orders
INNER JOIN classicmodels.customers ON classicmodels.orders.customerNumber = classicmodels.customers.customerNumber)
INNER JOIN classicmodels.payments ON classicmodels.orders.customerNumber = classicmodels.payments.customerNumber)
ORDER BY amountSpent DESC
LIMIT 10;";
    return (getRecords($sql));
}
//------------ (#5)

//------------ (#6)
function listUselessCustomers()
{
    $sql = "SELECT classicmodels.customers.customerNumber,
	   CONCAT(classicmodels.customers.contactFirstName, ' ',  classicmodels.customers.contactLastName) AS CustomerName,
	   classicmodels.customers.contactFirstName, classicmodels.customers.contactLastName,
       classicmodels.customers.phone, classicmodels.customers.country
     
FROM classicmodels.customers
LEFT JOIN classicmodels.orders ON classicmodels.customers.customerNumber = classicmodels.orders.customerNumber
WHERE classicmodels.orders.customerNumber IS NULL;";
    return (getRecords($sql));
}
//------------ (#6)

//------------ (#7)
function listCustomersByCountry()
{
    $sql = "SELECT country, Count(*) AS numOfCustomers
FROM classicmodels.customers
GROUP BY country
ORDER BY country;";
    return (getRecords($sql));
}
//------------ (#7)





function getRecords ($sql)
{
    global $db;
    
    $stmt = $db->prepare($sql);

     $results = array();
     if ($stmt->execute() && $stmt->rowCount() > 0) {
         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
    return $results;
}

function displayTable ($records) {
   $number_of_records = count ($records);
   echo "<p>$number_of_records records found.</p>";
   if ($number_of_records > 0) {
       // get headers
       $fields = array_keys ($records[0]);
      
       echo "<div class='table-responsive'>";
       echo "<table class='table table-striped' width='800'>";
       echo "<thead>";
       echo "<tr>";
        foreach ($fields as $f) {
            echo "<th>$f</th>";
        }
        echo "</tr>";
        echo "</thead>";
        foreach ($records as $record) {
            echo "<tr>";
            foreach ($record as $field) {
                echo "<td>$field</td>";
            }
            echo "</tr>";

        }
        echo "</table>";
        echo "</div>";
   }
   
}

?>