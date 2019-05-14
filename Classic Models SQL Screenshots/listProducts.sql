/*
Orders: display all products *ordered by order date in descending order*.
Display the following fields: *order date*, *order status*, *customer name*, *shipped date*,
products ordered for each order (product name, price), order total
Note: this will require joining a bunch of fields
*/
SELECT classicmodels.products.productName, classicmodels.products.productLine, classicmodels.productlines.textDescription,
	   classicmodels.products.quantityInStock, CONCAT("$", classicmodels.products.buyPrice) AS $buyPrice,
       CONCAT("$", classicmodels.products.MSRP) AS $MSRP
FROM classicmodels.products
INNER JOIN classicmodels.productlines ON classicmodels.products.productLine = classicmodels.productlines.productLine
ORDER BY productLine ASC;