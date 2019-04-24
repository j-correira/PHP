<?php
/*
(x) Create a php add page that is a form used for entering information about your actors.
(x) Create a php view page that is used to list all of the rows in the table as an html table..
(x) Enter at least five actors into the database table using the form
(x) Add a Page Header with a Nav
*/
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>J - Adding Corporations</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  

  
    <style>
        body
        {
            margin:auto;
            width: 80%;
            padding:45px;
        }
        
        #formBox
        {
            width: 212px;
        }
        
        #submitBtn
        {
            width: 212px;
        }
        
        #results
        {
            display: none;
            margin-top: 22px;
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
            $stmt = $db->prepare("INSERT INTO corps SET corp = :corp, incorp_dt = now(), email = :email, zipcode = :zipcode, owner = :owner, phone = :phone ");
            
            //set textbox value to variable
            $corp = filter_input(INPUT_POST, 'corp');
            //$incorp_dt = filter_input(INPUT_POST, 'incorp_dt');
            $email = filter_input(INPUT_POST, 'email');
            $zipcode = filter_input(INPUT_POST, 'zipcode');
            $owner = filter_input(INPUT_POST, 'owner');
            $phone = filter_input(INPUT_POST, 'phone');

            $binds = array(
                ":corp" => $corp,
                //":incorp_dt" => $incorp_dt,
                ":email" => $email,
                ":zipcode" => $zipcode,
                ":owner" => $owner,
                ":phone" => $phone
            );

            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = "<h2 style='color:green; text-decoration: underline; margin-bottom: 20px;'>Data Successfully Added</h2>";
            }
        }        
        ?>
        
        
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><b>J Correira</b></a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="viewAll.php">View All</a></li>
                <li class="active"><a href="create.php">Create</a></li>
                <li><a href="read.php">Read</a></li>
                <li><a href="update.php">Update</a></li>
                <li><a href="delete.php">Delete</a></li>
                <li><a href="formProcess.php">Search & Sort</a></li>
                
            </ul>
        </div>
    </nav>
        
        <h1><?php echo $results; ?></h1>

        <form method="post" action="#">            
            Corporation Name <input type="text" id='formBox' class="form-control" value="Test Corp Name" placeholder="Test Corp Name" name="corp" />
            <br />
            Email <input type="text" id='formBox' class="form-control" value="test@test.com" placeholder="test@test.com" name="email" />
            <br />
            Zipcode <input type="text" id='formBox' class="form-control" value="55555" placeholder="55555" name="zipcode" />
            <br />
            Owner <input type="text" id='formBox' class="form-control" value="Test Owner Name" placeholder="Test Owner Name" name="owner" />
            <br />
            Phone <input type="text" id='formBox' class="form-control" value="(555)555-5555" placeholder="(555)555-5555" name="phone" />
            <br />

            <input type="submit" class="btn btn-success" id="submitBtn" value="Submit" />
        </form>
  
    </body>
</html>


