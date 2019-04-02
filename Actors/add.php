<?php
/*
(x) Create a php add page that is a form used for entering information about your actors.
(-) Create a php view page that is used to list all of the rows in the table as an html table..
(-) Enter at least five actors into the database table using the form
(-) Add a Page Header with a Nav
*/
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>J - Adding Actors</title>
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
        
        #formBox
        {
            width: 212px;
        }
        
        #submitBtn
        {
            width: 212px;
        }

  </style>
    </head>
    <body>
        <?php
        include './dbconnect.php';
        include './functions.php';
    
        $results = '';
        if (isPostRequest()) {
            $db = getDatabase();
            $stmt = $db->prepare("INSERT INTO actors SET firstname = :firstName, lastname = :lastName, dob = :bDay, height = :height");
            
            //set textbox value to variable
            $firstName = filter_input(INPUT_POST, 'firstName');
            $lastName = filter_input(INPUT_POST, 'lastName');
            $bDay = filter_input(INPUT_POST, 'bDay');
            $height = filter_input(INPUT_POST, 'height');

            $binds = array(
                ":firstName" => $firstName,
                ":lastName" => $lastName,
                ":bDay" => $bDay,
                ":height" => $height
            );

            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Data Added';
            }
        }        
        ?>
        
        
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><b>J Correira</b></a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="add.php">Adding Actors</a></li>
                <li><a href="view.php">Viewing Actors</a></li>
            </ul>
        </div>
    </nav>
        
        <h1><?php echo $results; ?></h1>

        <form method="post" action="#">            
            First Name <input type="text" id='formBox' class="form-control" value="test first name" name="firstName" />
            <br />
            Last Name <input type="text" id='formBox' class="form-control" value="test last name" name="lastName" />
            <br />
            Birthday &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id='formBox' class="form-control" value="1/1/1111" name="bDay" />
            <br />
            Height &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id='formBox' class="form-control" value="short" name="height" />
            <br />

            <input type="submit" class="btn btn-success" id="submitBtn" value="Submit" />
        </form>
        
        
        

        
    </body>
</html>


