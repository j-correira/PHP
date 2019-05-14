/*
Orders: display all products *ordered by order date in descending order*.
Display the following fields: *order date*, *order status*, *customer name*, *shipped date*,
products ordered for each order (product name, price), order total
Note: this will require joining a bunch of fields
*/

SELECT #*,
	   classicmodels.orders.orderDate, classicmodels.orders.status, classicmodels.customers.customerName,
       classicmodels.orders.shippedDate, classicmodels.products.productName, classicmodels.products.buyPrice, 
       classicmodels.orderdetails.quantityOrdered * classicmodels.products.buyPrice AS orderTotal
       
FROM (((classicmodels.products

INNER JOIN classicmodels.orderdetails ON classicmodels.products.productCode = classicmodels.orderdetails.productCode)
INNER JOIN classicmodels.orders ON classicmodels.orderdetails.orderNumber = classicmodels.orders.orderNumber)
INNER JOIN classicmodels.customers ON classicmodels.orders.customerNumber = classicmodels.customers.customerNumber)
ORDER BY classicmodels.orders.orderDate DESC