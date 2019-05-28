<?php
include_once './dbconnect.php';
$db =  getDatabase(); 

//check if Post request is made
function isPostRequest()
{
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

//check if Get request is made
function isGetRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' );
}





function displayTable ($records) {
   $number_of_records = count ($records);
   echo "<p>$number_of_records records found.</p>";
   if ($number_of_records > 0) {
       // get headers
       $fields = array_keys ($records[0]);
      
       echo "<div class='table-responsive'>";
       echo "<table class='table table-striped' width='800'>";
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
                //echo "<td>$row['CountryDetailID']</td>";
            }
            echo "</tr>";

        }
        echo "</table>";
        echo "</div>";
   }
}


function returnCountrySearch($searchWord)
{       
    //db connection
    $db = getDatabase();

    //SQL statement
    $stmt = $db->prepare("SELECT * FROM se266_001248229.countrydetails WHERE CountryName LIKE :search");
      
    //search word = wildcard
    $search = '%'.$searchWord.'%';
    
    $binds = array(
    ":search" => $search,
    );

    //execute SQL
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
        
    return $results;
}  


function returnRegionSearch($searchWord)
{       
    //db connection
    $db = getDatabase();

    //SQL statement
    $stmt = $db->prepare("SELECT * FROM se266_001248229.countrydetails WHERE CountryRegion LIKE :search");
      
    //search word = wildcard
    $search = '%'.$searchWord.'%';
    
    $binds = array(
    ":search" => $search,
    );

    //execute SQL
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
        
    return $results;
}  

function returnNameOrRegionSearch($searchWord1, $searchWord2)
{       
    //db connection
    $db = getDatabase();

    //SQL statement
    $stmt = $db->prepare("SELECT * FROM se266_001248229.countrydetails WHERE CountryName LIKE :search1 OR CountryRegion LIKE :search2;");
      
    //search word = wildcard
    $search1 = '%'.$searchWord1.'%';
    $search2 = '%'.$searchWord2.'%';
        
    $binds = array(
    ":search1" => $search1,
    ":search2" => $search2
    );

    //execute SQL
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
        
    return $results;
}


?>