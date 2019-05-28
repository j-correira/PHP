<?php
include './dbconnect.php';
   
///////////////////////////////////////////////////
//GET returns JSON of 2 arrays   
    $db2 = getDatabase();
   
    $stmt2 = $db2->prepare("SELECT CountryRegion, SUM(CountryPopulation) AS Region_Population
                              FROM se266_001248229.countrydetails
                              GROUP BY CountryRegion;");
      
    $votes = array();
    if ($stmt2->execute() && $stmt2->rowCount() > 0)
    {
        $votes = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    }
    //echo json_encode($results2);
    
    $results2 = array();
    $results2[0] = array(); //name
    $results2[1] = array (); //population
    
    
    //fill arrays with data
    foreach ($votes as $v) {
        array_push($results2[0], $v['CountryRegion']);
        array_push($results2[1], $v['Region_Population']);
    }
    echo json_encode($results2);
    
    
?>

