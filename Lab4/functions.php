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
function getAllTestData($db, $stmt){
    
        //db connection
        $db = getDatabase();

        //SQL statement
        $stmt = $db->prepare("SELECT *, DATE_FORMAT(incorp_dt,'%m/%d/%Y') AS incorp_dt FROM corps");

        //execute SQL
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        return $results;
}


//returning search data
function returnSearch($searchWord, $column)
{       
        //db connection
        $db = getDatabase();

        //SQL statement
        $stmt = $db->prepare("SELECT *, DATE_FORMAT(incorp_dt,'%m/%d/%Y') AS incorp_dt FROM corps WHERE $column LIKE :search");
       
        //search word = wildcard
        $search = '%'.$searchWord.'%';
        
        $binds = array(
        ":search" => $search 
        );

        //execute SQL
        $results = array();
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        return $results;
}



//returning sort data
function returnSort($column, $order)
{
            //db connection
        $db = getDatabase();

        //SQL statement
        $stmt = $db->prepare("SELECT *, DATE_FORMAT(incorp_dt,'%m/%d/%Y') AS incorp_dt FROM corps ORDER BY $column $order");
        
        //execute SQL
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        return $results;
}


//output columns
function outputColumns($row)
{
                foreach ($results as $row) {
                /*
                    <td>echo $row['corp'];</td>
                    <td>echo $row['incorp_dt'];</td>
                    <td>echo $row['email'];</td>
                    <td>echo $row['zipcode'];</td>
                    <td>echo $row['owner'];</td>
                    <td>echo $row['phone'];</td>
                */
                }
                return $results;
}

?>