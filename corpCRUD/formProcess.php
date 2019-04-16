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
<!-- /nav -->

<h2>Processing Forms</h2>
<hr>

<?php
        $action = filter_input(INPUT_GET, 'action');
        
        //form1.php
        if ($action === 'Search')
        { 
            echo '<h3 style="color:green; text-decoration:underline;">Submitted Search form!<br><br></h3>';
        }
        
        //form2.php
        if ($action === 'OrderBy')
        { 
            echo '<h3 style="color:green; text-decoration:underline;">Submitted Order By form!<br><br></h3>';
        }
        
        include './includes/form1.php';
        include './includes/form2.php';
?>
    </body>
</html>