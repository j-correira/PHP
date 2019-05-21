<?php

//echo $_POST['characterID'];

$characterID = $_POST['characterID'];
$voterIP = $_SERVER['REMOTE_ADDR'];

//echo ("<h1>$characterID</h1>");

include ('functions/dbconnect2.php');

//db connection
$db = getDatabase();
    
//SQL statement
$stmt = $db->prepare("INSERT INTO disneyvotes (disneycharacterID, VoterIP, VoterDateTime) VALUES (:charID, :voterIP, NOW());");

$binds = array(
":charID" => $characterID,
":voterIP" => $voterIP
);

//execute SQL
$results = array();

if ($stmt->execute($binds) && $stmt->rowCount() > 0)
{
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}



//GET returns JSON of 2 arrays (Characters, #Votes)   
/*
    $db = getDatabase();
   
    $stmt = $db->prepare("SELECT disneyvotes.DisneyCharacterID, DisneyCharacterName, Count(*) AS numVotes
FROM disneyvotes
INNER JOIN disneycharacters
ON disneyvotes.DisneyCharacterID = disneycharacters.DisneyCharacterID
GROUP BY DisneyCharacterName
ORDER BY DisneyCharacterID;");
      
    $votes = array();
    
    if ($stmt->execute() && $stmt->rowCount() > 0)
    {
        $votes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //echo json_encode($characters);
*/

    //setup arrays for data

    $voteResults = array($_GET['characterName'], $_GET['characterVotes']);
    
    echo json_encode($voteResults);
/*    
    $voteResults[0] = array(); //id
    $voteResults[1] = array (); //name
    $voteResults[2] = array (); //# votes
    

    //fill arrays with data
    foreach ($votes as $v)
    {
        array_push($voteResults[0], $v['DisneyCharacterID']);
        array_push($voteResults[1], $v['DisneyCharacterName']);
        array_push($voteResults[2], $v['numVotes']);
    }
    echo json_encode($voteResults);
 */
?>