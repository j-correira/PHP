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
        
        
  </style>
    </head>
    <body>
        <?php
        //include outside files
        include_once './dbconnect.php';
        
        $id = filter_input(INPUT_GET, 'id');
       
        //db connection
        $db = getDatabase();

        //SQL statement
        $stmt = $db->prepare("DELETE FROM corps where id = :id");
        
        
        $binds = array(
            ":id" => $id
        );
        
                
        $isDeleted = false;
        if ($stmt->execute($binds) && $stmt->rowCount() > 0)
        {
            $isDeleted = true;
        } 
        
        ?>
        
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><b>J Correira</b></a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="viewAll.php">View All</a></li>
                <li><a href="create.php">Create</a></li>
                <li><a href="read.php">Read</a></li>
                <li><a href="update.php">Update</a></li>
                <li class="active"><a href="delete.php">Delete</a></li>
                <li><a href="formProcess.php">Search & Sort</a></li>
            </ul>
        </div>
    </nav>
               
        <h1> Record <?php echo $id; ?>  
            <?php if ( !$isDeleted ): ?>Not<?php endif; ?> 
            Deleted
        </h1>
        
        <br>
        <br>
        <a href="<?php echo filter_input(INPUT_SERVER, 'HTTP_REFERER'); ?>" class="btn btn-danger" role="button">Go back to View Page</a>

 
    </body>
</html>