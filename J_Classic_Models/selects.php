<?php


include ('dbconnect.php');
$db =  dbconnect();  

// (#1)
function listCustomers()
{
    $sql = "SELECT country, Count(*) AS numOfCustomers
            FROM classicmodels.customers
            GROUP BY country
            ORDER BY country;";
    return (getRecords($sql));
}

// (#2)
function listEmployees()
{
    $sql = "SELECT A.firstName, A.lastName, A.jobTitle, A.extension, A.email, A.officeCode, 
       CONCAT(classicmodels.offices.addressLine1, ' ', COALESCE(classicmodels.offices.addressLine2, ' '),
       ' ', COALESCE(classicmodels.offices.state, ' '),  ' ', classicmodels.offices.country,  ' ',
	   classicmodels.offices.postalCode) AS officeLocation,
	   A.reportsTo, CONCAT(B.firstName, ' ', B.lastName) AS managerName
       
FROM classicmodels.employees A, classicmodels.employees B
INNER JOIN classicmodels.offices ON B.officeCode = classicmodels.offices.officeCode
WHERE A.reportsTo = B.employeeNumber
ORDER BY A.lastName DESC, A.firstName;";
    return (getRecords($sql));
}

// (#3)
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

// (#4)
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

// (#5)
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

// (#6)
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

// (#7)
function listCustomersByCountry()
{
    $sql = "SELECT country, Count(*) AS numOfCustomers
FROM classicmodels.customers
GROUP BY country
ORDER BY country;";
    return (getRecords($sql));
}





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
      
       echo "<table border='1'>";
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
   }
   
}

?>