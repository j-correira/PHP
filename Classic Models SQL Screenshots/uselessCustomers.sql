/*
Useless customers: list all customers who have never placed an order

Display the following fields:
Customer Name, Contact First Name, Contact Last Name, Phone Number and Country
*/

SELECT classicmodels.customers.customerNumber,
	   CONCAT(classicmodels.customers.contactFirstName, ' ',  classicmodels.customers.contactLastName) AS CustomerName,
	   classicmodels.customers.contactFirstName, classicmodels.customers.contactLastName,
       classicmodels.customers.phone, classicmodels.customers.country
     
FROM classicmodels.customers
LEFT JOIN classicmodels.orders ON classicmodels.customers.customerNumber = classicmodels.orders.customerNumber
WHERE classicmodels.orders.customerNumber IS NULL;

