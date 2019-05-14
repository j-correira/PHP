<?php

include_once __DIR__ . '/dbconnect2.php';


//get ALL data
function getAllTestData(){
    
    $db = dbconnect();
           
    $stmt = $db->prepare("SELECT * FROM disneycharacters");
    
     $results = array();
     
     if ($stmt->execute() && $stmt->rowCount() > 0) {
         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
     
    //var_dump();
     
    return $results;
}
?>




