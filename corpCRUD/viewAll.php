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
            border-left: dotted 8px gray;
            border-right: dotted 8px gray;
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
            width: 101px;
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
        window.scrollBy(0, 3500);
        }
        
        function scrollUp()
        {
        window.scrollTo(0, 0);
        }
</script>
    </head>
    
    
    
<div id="scrollBtns" class="btn-group">
  <button type="button" id="scrollDownBtn" class="btn" onclick="scrollDown()">Scroll Down</button>
  <button type="button" id="scrollUpBtn" class="btn" onclick="scrollUp()">Scroll Up</button>
</div>
    
    
    <body>
        <?php
        //include outside files
        include './dbconnect.php';
        include './functions.php';
        
        //db connection
        $db = getDatabase();

        //SQL statement
        $stmt = $db->prepare("SELECT * FROM corps");

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
                <li class="active"><a href="viewAll.php">View All</a></li>
                <li><a href="create.php">Create</a></li>
                <li><a href="read.php">Read</a></li>
                <li><a href="update.php">Update</a></li>
                <li><a href="delete.php">Delete</a></li>
            </ul>
        </div>
    </nav>
            
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Corporation Name</th>
                </tr>
            </thead>
            <tbody>  
                          
            <?php foreach ($results as $row) { ?>
                <tr>
                    <td><?php echo $row['corp']; ?></td>
                </tr>
            <?php } ?>
            
            </tbody>
        </table>             
    </body>
</html>