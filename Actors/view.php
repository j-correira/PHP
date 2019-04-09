<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>J - Viewing Actors</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <style>
        body
        {
            margin:auto;
            width: 80%;
            padding:45px;
            border-left: dotted 8px gray;
            border-right: dotted 8px gray;
        }
        
        
  </style>
    </head>
    <body>
        <?php
        //include outside files
        include './dbconnect.php';
        include './functions.php';
        
        //db connection
        $db = getDatabase();

        //SQL statement
        $stmt = $db->prepare("SELECT * FROM actors");

        //execute SQL
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>
        
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><b>J Correira</b></a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="add.php">Adding Actors</a></li>
                <li class="active"><a href="view.php">Viewing Actors</a></li>
            </ul>
        </div>
    </nav>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID #</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Birthday</th>
                    <th>Height</th>
                </tr>
            </thead>
            <tbody>           
            <?php foreach ($results as $row) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['dob']; ?></td>
                    <td><?php echo $row['height']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        
        
        
        
    </body>
</html>