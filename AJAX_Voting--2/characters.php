<?php
    include './functions/dbconnect2.php';

    
    $db = getDatabase();
   
    $stmt = $db->prepare("SELECT * from disneyCharacters");
      
    $characters = array();
    
    if ($stmt->execute() && $stmt->rowCount() > 0)
    {
        $characters = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //echo json_encode($characters);
    
    //setup arrays for data
    $results = array();
    $results[0] = array(); //id
    $results[1] = array (); //name
    $results[2] = array (); //image
    
    
    //fill arrays with data
    foreach ($characters as $c)
    {
        array_push($results[0], $c['DisneyCharacterID']);
        array_push($results[1], $c['DisneyCharacterName']);
        array_push($results[2], $c['DisneyCharacterImage']);
    }
    echo json_encode($results);

    
    ?>