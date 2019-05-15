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
    //echo json_encode($results);
    ?>

<br>
<br>

<?php //echo ($results[2][1]); ?>
    
<style>
    .characterDiv
    {
        border: 1px solid black;
        border-radius: 4px;
        width:295px;
        float:left;
        padding-top: 10px;
        margin-right: 65px;
        text-align: center;
    }
    
    .btn
    {
        width: 294px;
        height: 65px;
    }

</style>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<!-- JS chart library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

    



<div class="container">
    
    
<div id="donald" class="characterDiv">
    <img src="images/<?php echo($results[2][0]); ?>" alt="Donald Duck">
    <h3><?php echo($results[1][0]); ?></h3>
    <br>
    <button type="button" class="btn btn-primary">Vote for Donald</button>
</div>

<div id="mickey" class="characterDiv">
    <img src="images/<?php echo($results[2][1]); ?>" alt="Mickey Mouse">
    <h3><?php echo($results[1][1]); ?></h3>
    <br>
    <button type="button" class="btn btn-primary">Vote for Mickey</button>
</div>

<div id="goofy" class="characterDiv">
    <img src="images/<?php echo($results[2][2]); ?>" alt="Goofy Goof">
    <h3><?php echo($results[1][2]); ?></h3>
    <br>
    <button type="button" class="btn btn-primary">Vote for Goofy</button>
</div>
    
<div id="JSchart">

</div>
    
</div><!-- /container -->