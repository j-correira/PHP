<?php

//echo $_POST['characterID'];
//$_POST['characterID'] = "";
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
    $db2 = getDatabase();
   
    $stmt2 = $db2->prepare("SELECT disneyvotes.DisneyCharacterID, DisneyCharacterName, Count(*) AS numVotes
                            FROM disneyvotes
                            INNER JOIN disneycharacters
                            ON disneyvotes.DisneyCharacterID = disneycharacters.DisneyCharacterID
                            GROUP BY DisneyCharacterName
                            ORDER BY DisneyCharacterID;");
      
    $votes = array();
    
    if ($stmt2->execute() && $stmt2->rowCount() > 0)
    {
        $votes = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    }
    
    //$voteResults[0] = array(); //id
    $voteResults[0] = array (); //name
    $voteResults[1] = array (); //# votes
    
    //fill arrays with data
    foreach ($votes as $v)
    {
        //array_push($voteResults[0], $v['DisneyCharacterID']);
        array_push($voteResults[0], $v['DisneyCharacterName']);
        array_push($voteResults[1], $v['numVotes']);

    }
                //echo ("not encoded " . $voteResults[0][1] . " " . $voteResults[1][1] . "<br><br>");

    echo json_encode($voteResults);
    echo ("words");
    
    //$voteResults = array ($_GET['characterName'], $_GET['characterVotes']);
?>