<?php

/* 
(-) upload.php takes a comma-delimited file schools.csv
    and imports it into a table named school with fields for school name, city and state.
(-) Before uploading the php script must delete existing records in the table.
(-) Once the file is uploaded, the user is brought to search.php.
 
(-) The user is not allowed to navigate directly to upload.php or search.php.
   If the user is not logged in (check by referring to a $_SESSION variable), the user is brought back to login.php.
 * 
 * 
 * 
 * 
 * Example Code (data infile)
 https://stackoverflow.com/questions/18915104/php-import-csv-file-to-mysql-database-using-load-data-infile
 */

        //include outside files
        include './dbconnect.php';
        include './functions.php';
        
        //db connection
        $db = getDatabase();

        //SQL statement      
        //$stmt = $db->prepare("SELECT * FROM schools");
    
        $stmt = "LOAD DATA INFILE 'schools.csv'
        INTO TABLE schools
        FIELDS TERMINATED BY ','
        OPTIONALLY ENCLOSED BY '\"' 
        LINES TERMINATED BY ',,,\\r\\n'
        IGNORE 1 LINES 
        (schoolName, city, abbreviation,),
            schoolName = NULLIF(schoolName, 'null'),
            city  = NULLIF(@city, 'null'),
            abbreviation = NULLIF(@abbreviation, 'null')"
    
        mysqli_query($stmt, $db);
        
        //execute SQL
    /*
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    */   
        //getAllTestData();
        
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<title>Wee 5 - Upload</title>
</head>
<body>

<h1>Uploading Schools.csv</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>School Name</th>
                    <th>City</th>
                    <th>Abbreviation</th>
                </tr>
            </thead>
            <tbody>  
                          
            <?php foreach ($results as $row) { ?>
                <tr>
                    <td><?php echo $row['schoolName']; ?></td>
                    <td><?php echo $row['city']; ?></td>
                    <td><?php echo $row['abbreviation']; ?></td>
                </tr>
            <?php } ?>
            
            </tbody>
        </table>  


</body>
</html>






