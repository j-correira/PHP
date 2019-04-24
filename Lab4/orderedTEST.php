<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>J - Viewing Corporations</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
        body
        {
            margin:auto;
            width: 80%;
            padding:45px;
        }
        
        #scrollDownBtn
        {
            position:fixed;
            bottom: 20px;
            right: 10px;
            border-radius: 0px 0px 10px 10px;
            
        }
        
        #scrollUpBtn
        {
            position:fixed;
            margin-left:100px;    
            right: 10px;
            bottom: 54px;
            border-radius: 10px 10px 0px 0px;
            width: 134px;
        }
        
        #scrollBtns
        {
            postion:fixed;
            z-index: 2;
        }       
  </style>
  </head>
  <body>

<nav class="navbar navbar-default">
        <div class="container-fluid"> 
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><b>J Correira</b></a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="viewAll.php">View All</a></li>
                <li><a href="create.php">Create</a></li>
                <li><a href="read.php">Read</a></li>
                <li><a href="update.php">Update</a></li>
                <li><a href="delete.php">Delete</a></li>
            </ul>
        </div>
</nav>
    
<h2>Testing Ordered By</h2>
<hr>
        <?php
        //include outside files
        include_once './dbconnect.php';
        include './functions.php';
        
        //define column name + search word
        //$column = 'corp';
        //$order = 'ASC';
        
        //receive variables from other page
        //$searchWord = $_GET["searchValue"];
        //
        $column = $_GET["dropDownValue"];
        $order = $_GET["radioBTN"];
        
        
        returnSort($column, $order);
        
    /*  commented out to test "returnSort" func
        //db connection
        $db = getDatabase();

        //SQL statement
        $stmt = $db->prepare("SELECT * FROM corps ORDER BY $column $order");
        

        //execute SQL
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
     *
     */
        ?>

<h3>Sorting by: <u><?php echo $column ?></u></h3>
<?php /*($column); */?>
<br>
<h3>Ordered by: <u><?php echo $order ?></u></h3>
<?php /*var_dump($order); */?>
<br>
<br>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Corporation Name</th>
                    <th>Incorporation Date</th>
                    <th>Email</th>
                    <th>Zipcode</th>
                    <th>Owner</th>
                    <th>Phone<th>
                </tr>
            </thead>
            <tbody>  
                          
            <?php foreach (returnSort($column, $order) as $row) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>
                    <td><?php echo $row['incorp_dt']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['zipcode']; ?></td>
                    <td><?php echo $row['owner']; ?></td>
                    <td><?php echo $row['phone']; ?></td>    
                </tr>
            <?php } ?>
            
            </tbody>
        </table> 

    </body>
</html>