/*
(2) Employees: list all employees sorted by last name, first name
Display the following fields: *First Name*, *Last Name*, *Extension*,
	*email*, *office location*, *name of manager*, *job Title*
Note: this will require an inner join between the employees table and the offices table
	as well as a self join on the employees table to get the name of the manager (reportsTo)
*/
SELECT A.firstName, A.lastName, A.jobTitle, A.extension, A.email, A.officeCode, 
       CONCAT(classicmodels.offices.addressLine1, ' ', COALESCE(classicmodels.offices.addressLine2, ' '),
       ' ', COALESCE(classicmodels.offices.state, ' '),  ' ', classicmodels.offices.country,  ' ',
	   classicmodels.offices.postalCode) AS officeLocation,
	   A.reportsTo, CONCAT(B.firstName, ' ', B.lastName) AS managerName
       
FROM classicmodels.employees A, classicmodels.employees B
INNER JOIN classicmodels.offices ON B.officeCode = classicmodels.offices.officeCode
WHERE A.reportsTo = B.employeeNumber
ORDER BY A.lastName DESC, A.firstName
