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
    
    
    
    
//test getting #votes
    $stmt2 = $db->prepare("SELECT disneyvotes.DisneyCharacterID, DisneyCharacterName, Count(*) AS numVotes
FROM disneyvotes
INNER JOIN disneycharacters
ON disneyvotes.DisneyCharacterID = disneycharacters.DisneyCharacterID
GROUP BY DisneyCharacterName
ORDER BY DisneyCharacterID;");
      
    $numVotes = array();
    
    if ($stmt2->execute() && $stmt2->rowCount() > 0)
    {
        $numVotes = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    }
    //echo json_encode($characters);
    
    //setup arrays for data
    $results2 = array();
    //$results2[0] = array(); //id
    $results2[1] = array (); //name
    $results2[2] = array (); //#votes
    
    
    //fill arrays with data
    foreach ($numVotes as $v)
    {
        //array_push($results2[0], $v['DisneyCharacterID']);
        array_push($results2[1], $v['DisneyCharacterName']);
        array_push($results2[2], $v['numVotes']);
    }
    ?>

<br>
<br>

<?php //echo ($results2[1][0] . " "); 
 //echo ($results2[2][0]);
?>
    





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

    #myChart2
    {

    }
    
    #resultDiv
    {
        width:410px;
    }
    
    #ajaxButton2
    {
        margin-top:25px;
        font-size:18px;
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
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    



<div class="container">
    
    
<div id="donald" class="characterDiv">
    <img src="images/<?php echo($results[2][0]); ?>" alt="Donald Duck">
    <h3><?php echo($results[1][0]); ?></h3>
    <br>
    <button id="addDonald" type="button" class="btn btn-primary" onclick="displayChart()" >Vote for Donald</button>
</div>

<div id="mickey" class="characterDiv">
    <img src="images/<?php echo($results[2][1]); ?>" alt="Mickey Mouse">
    <h3><?php echo($results[1][1]); ?></h3>
    <br>
    <button id="addMickey" type="button" class="btn btn-primary" onclick="displayChart()" >Vote for Mickey</button>
</div>

<div id="goofy" class="characterDiv">
    <img src="images/<?php echo($results[2][2]); ?>" alt="Goofy Goof">
    <h3><?php echo($results[1][2]); ?></h3>
    <br>
    <button id="addGoofy" type="button" class="btn btn-primary" onclick="displayChart()" >Vote for Goofy</button>
</div>
    
<div id="JSchart">

</div>
    <br>
    <br>
    <br>
    
    <div id="resultDiv" >
    
    </div>
    
    <br>
    <br>

    

    <canvas id="myChart2"></canvas>


    
    
</div><!-- /container -->

<script>   
//----------- Donald
(function() {
  var httpRequest;
  document.getElementById("addDonald").addEventListener('click', makeRequest);
  function makeRequest() {
    httpRequest = new XMLHttpRequest();
    if (!httpRequest) {
      alert('ERROR! Cannot create an XMLHTTP instance');
      return false;
    }
    httpRequest.onreadystatechange = displayContents;
    httpRequest.open('POST', 'vote.php');
    httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    httpRequest.send('characterID=' + encodeURIComponent("1"));
    
  }
  function displayContents() {
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
      if (httpRequest.status === 200) {
        //---- document.getElementById("resultDiv").innerHTML = httpRequest.responseText;
      } else {
        alert('Something went wrong...');
      }
    }
  }
})();
//----------- Donald


//----------- Mickey
(function() {
  var httpRequest;
  document.getElementById("addMickey").addEventListener('click', makeRequest);
  function makeRequest() {
    httpRequest = new XMLHttpRequest();
    if (!httpRequest) {
      alert('ERROR! Cannot create an XMLHTTP instance');
      return false;
    }
    httpRequest.onreadystatechange = displayContents;
    httpRequest.open('POST', 'vote.php');
    httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    httpRequest.send('characterID=' + encodeURIComponent("2"));
    
  }
  function displayContents() {
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
      if (httpRequest.status === 200) {
        //---- document.getElementById("resultDiv").innerHTML = httpRequest.responseText;
      } else {
        alert('Something went wrong...');
      }
    }
  }
})();
//----------- Mickey



//----------- Goofy
(function() {
  var httpRequest;
  document.getElementById("addGoofy").addEventListener('click', makeRequest);
  function makeRequest() {
    httpRequest = new XMLHttpRequest();
    if (!httpRequest) {
      alert('ERROR! Cannot create an XMLHTTP instance');
      return false;
    }
    httpRequest.onreadystatechange = displayContents;
    httpRequest.open('POST', 'vote.php');
    httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    httpRequest.send('characterID=' + encodeURIComponent("3"));
    
  }
  function displayContents() {
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
      if (httpRequest.status === 200) {
        //---- document.getElementById("resultDiv").innerHTML = httpRequest.responseText;
      } else {
        alert('Something went wrong...');
      }
    }
  }
})();
//----------- Goofy

   


</script>

<script>
    
    $(document).ready(function () {
        
        $.get ("getVotes.php", function (data) {
           votes = JSON.parse(data);
           //undef = JSON.parse(undefined)

           console.log (votes);
           
           
           new Chart(document.getElementById("myChart2"), {
                type: 'bar',
                data: {
                  labels: votes[0],
                  datasets: [
                    {
                      label: "Number of Votes",
                      backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
                      data: votes[1],
                      borderWidth: 10
                    }
                  ]
                },

            });
           
        });
        
        
        
    })
 </script>