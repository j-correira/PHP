<?php
include './dbconnect.php';
include './header.php';

        //db connection
        $db = getDatabase();

        //SQL statement
        $stmt = $db->prepare("SELECT CountryRegion, SUM(CountryPopulation) AS Region_Population
                              FROM se266_001248229.countrydetails
                              GROUP BY CountryRegion;");

        //execute SQL
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

  
  
  <script>
    
    $(document).ready(function () {
        
        $.get ("getPopulations.php", function (data) {
           populations = JSON.parse(data);
           //undef = JSON.parse(undefined)
           console.log (populations);
           
           
           new Chart(document.getElementById("myChart2"), {
                type: 'bar',
                data: {
                  labels: populations[0],
                  datasets: [
                    {
                      label: "Number of People",
                      backgroundColor: ["#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", "#3e95cd", ],
                      data: populations[1],
                      borderWidth: 10
                    }
                  ]
                },
            });
           
        });
        
        
        
    })
 </script>
  
  
</head>
<body>

<div class="container">
    <h3><u>Population By Region</u></h3>
    <br>
    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Country ID #</th>
                    <th>Country Name</th>

                </tr>
            </thead>
            <tbody>           
            <?php foreach ($results as $row) { ?>
                <tr>
                    <td><?php echo $row['CountryRegion']; ?></td>
                    <td><?php echo $row['Region_Population']; ?></td>          
                </tr>
            <?php } ?>
            </tbody>
        </table>
    
    <br>
    <br>
    <br>
    <canvas id="myChart2"></canvas>
    
</div><!-- /container -->


</body>
</html>

