<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>J - Update Corporations</title>
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
        
        #results
        {
            display: none;
            margin-top: 22px;
        }
        
        #idResult
        {
            height: 40px;
            width: max-content;
            border: solid 1px #DBDBDB;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 16px;
        }
        
        h4
        {
            margin:0;
        }
        
        #backBtn
        {
            width: 212px;
            margin-top: -48px;
        }
    </style>

      
    </head>
    <body>
        <?php
        include './dbconnect.php';
        include './functions.php';
        
        $db = getDatabase();
    
        $corp = "";
        $email = "";
        $zipcode = "";
        $owner = "";
        $phone = "";
        
        if ( isPostRequest() ){
            
            $id = filter_input(INPUT_POST, 'id');
            
            $corp = filter_input(INPUT_POST, 'corp');
            $email = filter_input(INPUT_POST, 'email');
            $zipcode = filter_input(INPUT_POST, 'zipcode');
            $owner = filter_input(INPUT_POST, 'owner');
            $phone = filter_input(INPUT_POST, 'phone');
                                   
            $stmt = $db->prepare("UPDATE corps SET corp = :corp, email = :email, zipcode = :zipcode, owner = :owner, phone = :phone WHERE id = :id");
            
            $binds = array(
                ":id" => $id,
                ":corp" => $corp,
                //":incorp_dt" => $incorp_dt,
                ":email" => $email,
                ":zipcode" => $zipcode,
                ":owner" => $owner,
                ":phone" => $phone
            );
            
            $message = 'Update failed';
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
               $message = '<strong>Update Complete!</strong>';
            }
            
          } 
          
          else {
            $id = filter_input(INPUT_GET, 'id');
        }
        
        $stmt = $db->prepare("SELECT * FROM corps where id = :id");
        
        $binds = array(
             ":id" => $id
         );
        
         $result = array();
         
         
         if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $corp = $result['corp'];
            $email = $result['email'];
            $zipcode = $result['zipcode'];
            $owner = $result['owner'];
            $phone = $result['phone'];
         } else {
             header('Location: update.php');
             die('ID not found');            
         }
        
         
         //get id from url
        //$id = $_GET['id']
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
                <li class="active"><a href="update.php">Update</a></li>
                <li><a href="delete.php">Delete</a></li>
            </ul>
        </div>
    </nav>
        
             
        <div id ="idResult">
            <h4>id = <?php echo $id ?></h4>
        </div>

        <form method="post" action="#">            
            Corporation Name <input type="text" id='formBox' class="form-control" value="<?php echo $corp ?>" name="corp" />
            <br />
            Email <input type="text" id='formBox' class="form-control" value="<?php echo $email ?>" name="email" />
            <br />
            Zipcode <input type="text" id='formBox' class="form-control" value="<?php echo $zipcode ?>" name="zipcode" />
            <br />
            Owner <input type="text" id='formBox' class="form-control" value="<?php echo $owner ?>" name="owner" />
            <br />
            Phone <input type="text" id='formBox' class="form-control" value="<?php echo $phone ?>" name="phone" />
            <br />
            
            <input type="hidden" name="id" value="<?php echo $id ?>" />
            <input type="submit" class="btn btn-info" id="submitBtn" value="Update" />
        </form>
        <br>
        <br>
        <a href="read.php" class="btn btn-danger" id="backBtn" role="button">Go back to Read page</a>
        <br>
        <h4><?php if ( isset($message) ) { echo $message; } ?></h4>


        
        


    </body>
</html>


