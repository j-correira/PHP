<?php


/* 
(-) upload.php takes a comma-delimited file schools.csv
    and imports it into a table named school with fields for school name, city and state.
(-) Before uploading the php script must delete existing records in the table.
(-) Once the file is uploaded, the user is brought to search.php.
 
(-) The user is not allowed to navigate directly to upload.php or search.php.
   If the user is not logged in (check by referring to a $_SESSION variable), the user is brought back to login.php.
 * 
 */
    //include outside files
    include './dbconnect.php';
    include './functions.php';
    
    session_start();

    //var_dump($_SESSION);

    //check if user is logged in
    if (isset($_SESSION["login"]))
    {
        //do nothing, successfully logged in
        echo "<h1 style='color:green'>Successful login!</h1>";
    }
    else
    {
        echo "<h1>get outta here</h1>";
        header("location:login_1.php");
        die();
    }

    
    
    
    //db connection
    $db = getDatabase();
        
    
//delete before insert
    $stmtDel = $db->prepare("DELETE FROM schools");
    
    $bind = array(
    );
        
    $isDeleted = false;
    if ($stmtDel->execute() && $stmtDel->rowCount() > 0)
    {
        $isDeleted = true;
    }
//delete before insert
    
    
    //open file
    $file = fopen ('schools.csv', 'rb');
    fgetcsv($file);
    $stmt = $db->prepare("INSERT INTO schools SET schoolName = :schoolName, city = :city, state = :state;");
 
/*    
  //loops thru ENTIRE .csv
    while (!feof($file))
    {             
        $school = fgetcsv($file);
        
        //echo $school[0];
        
        $bind = array(
        ":schoolName" => $school[0],
        ":city" => $school[1],
        ":state" => $school[2],
        );
        
        $results = array();
        if ($stmt->execute($bind) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        //die after uploading 1 record
        die("done uploading");
    }// /while file open
*/    
    

    //loops thru & inserts first 100 lines of .csv
    while ($x <= 100)
    {             
        $school = fgetcsv($file);
        
        //echo $school[0];
        
        $bind = array(
        ":schoolName" => $school[0],
        ":city" => $school[1],
        ":state" => $school[2],
        );
        
        $results = array();
        if ($stmt->execute($bind) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
  
    $x++;   
    }// /while file open
    
    
    
    
    //after insert, redirect to search page
    header("location:search.php");
    die();
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<title>Uploading schools.csv</title>
</head>
<body>

<h1>Upload</h1>

<form action="fileUpload.php" method="post" enctype="multipart/form-data">
<input type="file" name="file1">
<input type="submit" value="Upload">
</form>


</body>
</html>






