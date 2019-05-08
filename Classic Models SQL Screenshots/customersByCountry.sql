/*
Customer by country: display all country names,
	along with the number of customers in each country and the total amount spent by customers in that country.
    
Order by country name.
*/

SELECT country, Count(*) AS numOfCustomers
FROM classicmodels.customers
GROUP BY country
ORDER BY country;

