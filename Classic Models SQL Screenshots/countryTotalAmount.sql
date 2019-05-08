/*
Customer by country: display all country names,
	along with the number of customers in each country and the total amount spent by customers in that country.
    
Order by country name.
*/

SELECT country, Count(*) AS numOfCustomers,
	   SUM(classicmodels.payments.amount) AS countryTotalAmount
FROM classicmodels.customers
INNER JOIN classicmodels.payments ON classicmodels.customers.customerNumber = classicmodels.payments.customerNumber
GROUP BY country
ORDER BY country;

