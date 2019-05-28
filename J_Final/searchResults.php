<?php
include './header.php';
include './functions.php';

//functions includes dbconnect.............
//include './dbconnect.php';
?>


<div id ="container">
    
    
<?php

if($_REQUEST['submit']=="Search Countries")
{
    $searchWord = $_GET["searchValueCountryName"];
    echo "<h3>Country being searched for: <u><h3 style='color:green'>$searchWord</h3></u></h3><br>";
    //$result = returnCountrySearch($searchWord);
    //var_dump ($result);
    //displayTable ($result);
    
    //db connection
    $db = getDatabase();

    //SQL statement
    $stmt = $db->prepare("SELECT * FROM se266_001248229.countrydetails WHERE CountryName LIKE :search");
      
    //search word = wildcard
    $search = '%'.$searchWord.'%';
    
    $binds = array(
    ":search" => $search,
    );

    //execute SQL
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
        
    //var_dump ($results);
  
}

if($_REQUEST['submit']=="Search Region")
{
    $searchWord = $_GET["searchValueCountryRegion"];
    echo "<h3>Region being searched for: <u><h3 style='color:green'>$searchWord</h3></u></h3><br>";
    //$result = returnRegionSearch($searchWord);
    //var_dump ($result);
    //displayTable ($result);
    
    
    //db connection
    $db = getDatabase();

    //SQL statement
    $stmt = $db->prepare("SELECT * FROM se266_001248229.countrydetails WHERE CountryRegion LIKE :search");
      
    //search word = wildcard
    $search = '%'.$searchWord.'%';
    
    $binds = array(
    ":search" => $search,
    );

    //execute SQL
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
        
}

if($_REQUEST['submit']=="Search Name And/Or Region")
{
    $searchWord1 = $_GET["searchValueCountryName3"];
    $searchWord2 = $_GET["searchValueCountryRegion3"];
    echo "<h3>Name being searched for: <u><h3 style='color:green'>$searchWord1</h3></u></h3><br>";
    echo "<h3>Region being searched for: <u><h3 style='color:green'>$searchWord2</h3></u></h3><br>";
    //$result = returnNameOrRegionSearch($searchWord1, $searchWord2);
    //var_dump ($result);
    //displayTable ($result);
    
    //db connection
    $db = getDatabase();

    //SQL statement
    
    $stmt = $db->prepare("SELECT * FROM se266_001248229.countrydetails WHERE CountryName LIKE :search1 AND CountryRegion LIKE :search2;");
    
        //working
    //$stmt = $db->prepare("SELECT * FROM se266_001248229.countrydetails WHERE CountryRegion LIKE :search2;");
    
        //working
    //$stmt = $db->prepare("SELECT * FROM se266_001248229.countrydetails WHERE CountryName LIKE :search1;");

      
    //search word = wildcard
    $search1 = '%'.$searchWord1.'%';
    $search2 = '%'.$searchWord2.'%';
        
    $binds = array(
    ":search1" => $search1,
    ":search2" => $search2
    );

    //execute SQL
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
    
    
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

</div>
<?php include './footer.php'; ?>



