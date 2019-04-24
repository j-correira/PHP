<!--

Create a view-all page that will ONLY DISPLAY NAME OF THE CORP and three action links.
Read, Update and Delete.

(x) The view page should also have a link to add a new corporation.



-->


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>J - Viewing Corporations</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
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
  
<script>
        function scrollDown()
        {
        window.scrollBy(0, 5000);
        }
        
        function scrollUp()
        {
        window.scrollTo(0, 0);
        }
</script>

    </head>
    <body>
        <?php
        //include outside files
        include './dbconnect.php';
        include './functions.php';
        
        //db connection
        $db = getDatabase();

        //SQL statement
        $stmt = $db->prepare("SELECT *, DATE_FORMAT(incorp_dt,'%m/%d/%Y') AS incorp_dt FROM corps");

        //execute SQL
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        ?>
        
<div id="scrollBtns" class="btn-group">
  <button type="button" id="scrollDownBtn" class="btn btn-info" onclick="scrollDown()">Scroll Down &nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-down"></span></button>
  <button type="button" id="scrollUpBtn" class="btn btn-info" onclick="scrollUp()">Scroll Up&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-up"></span></button>
</div>
               
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><b>J Correira</b></a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="viewAll.php">View All</a></li>
                <li><a href="create.php">Create</a></li>
                <li class="active"><a href="read.php">Read</a></li>
                <li><a href="update.php">Update</a></li>
                <li><a href="delete.php">Delete</a></li>
                <li><a href="formProcess.php">Search & Sort</a></li>

            </ul>
        </div>
    </nav>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID #</th>
                    <th>Corporation Name</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>  
                           
            <?php foreach ($results as $row) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>
                    <td><a class="btn btn-warning" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                    <td><a class="btn btn-primary" href="update.php?id=<?php echo $row['id']; ?>">Update</a></td>            
                </tr>
            <?php } ?>
            
            </tbody>
        </table>      
    </body>
</html>