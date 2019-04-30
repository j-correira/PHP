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
session_start();

//var_dump($_SESSION);

if (isset($_SESSION["login"]))
{
    //do nothing, successfully logged in
    echo "<h1 style='color:green'>Successful login!</h1>";
}
else
{
    echo "<h1>get outta here</h1>";
    header("location:login_2.php");
    die();
}



        //include outside files
        include './dbconnect.php';
        include './functions.php';
        
        //db connection
        $db = getDatabase();

        //SQL statement      
        //$stmt = $db->prepare("SELECT * FROM schools");
    /*
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
    */
        //mysqli_query($stmt, $db);
        
        //execute SQL
    /*
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    */   
        //getAllTestData();
        
        

    
    $file = fopen ('schools.csv', 'rb');
    fgetcsv($file);
    $stmt = $db->prepare("INSERT INTO schools SET schoolName = :schoolName, city = :city, abbreviation = :abbreviation;");
       
    
    
    
    while (!feof($file))
    {       
        
        
        
        $school = fgetcsv($file);
        
        echo $school[0];
        
        $bind = array(
        ":schoolName" => $school[0],
        ":city" => $school[1],
        ":abbreviation" => $school[2],
        );
    
    
        $results = array();
        if ($stmt->execute($bind) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<title>Wee 5 - Upload</title>
</head>
<body>

<h1>Upload</h1>




<?php

?>


<form action="fileUpload.php" method="post" enctype="multipart/form-data">
<input type="file" name="file1">
<input type="submit" value="Upload">

</form>



        <table class="table table-striped">
            <thead>
                <tr>
                    <th>School Name</th>
                    <th>City</th>
                    <th>Abbreviation</th>
                </tr>
            </thead>
            <tbody>  
                          
            <?php //foreach ($results as $row) { ?>
                <tr>
                    <td><?php //echo $row['schoolName']; ?></td>
                    <td><?php //echo $row['city']; ?></td>
                    <td><?php //echo $row['abbreviation']; ?></td>
                </tr>
            <?php //} ?>
            
            </tbody>
        </table>  


</body>
</html>






