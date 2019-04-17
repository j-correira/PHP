<?php

//check if Post request is made
function isPostRequest()
{
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

//check if Get request is made
function isGetRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' );
}





//new functions
function getAllTestData(){
    $db = dbconnect();
           
    $stmt = $db->prepare("SELECT * FROM corps");
     $results = array();
     if ($stmt->execute() && $stmt->rowCount() > 0) {
         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
    return $results;
}
/*
 * $stmt = $db->prepare("SELECT * FROM test ORDER BY $column $order");

function searchTest($column, $search)
{
    
}
 */    


?>