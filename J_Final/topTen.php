<?php
include './dbconnect.php';
include './header.php';

        //db connection
        $db = getDatabase();

        //SQL statement
        $stmt = $db->prepare("SELECT * FROM se266_001248229.countrydetails
                              ORDER BY CountryPopulation DESC
                              LIMIT 10;");

        //execute SQL
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        //var_dump($results);
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
</head>
<body>

<div class="container">
    <h3><u>Top 10 Most Populated Countries</u></h3>
    <br>
    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Country ID #</th>
                    <th>Country Name</th>
                    <th>Country Region</th>
                    <th>Country Population</th>
                    <th>Country Size</th>
                    <th>Update/Edit</th>
                </tr>
            </thead>
            <tbody>           
            <?php foreach ($results as $row) { ?>
                <tr>
                    <td><?php echo $row['CountryDetailID']; ?></td>
                    <td><?php echo $row['CountryName']; ?></td>
                    <td><?php echo $row['CountryRegion']; ?></td>
                    <td><?php echo $row['CountryPopulation']; ?></td>
                    <td><?php echo $row['CountrySize']; ?></td>
                    <td><a class="btn btn-primary" href="update.php?id=<?php echo $row['CountryDetailID']; ?>">Update</a></td>            

                </tr>
            <?php } ?>
            </tbody>
        </table>
    
    
</div><!-- /container -->

<?php include './footer.php'; ?>

</body>
</html>