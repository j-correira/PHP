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
  
<script>
    function resetSearchForm()
    {
        document.getElementById("searchForm").reset();
    }
</script>   

  </head>
  <body>

<h3>Search:</h3>
<form id="searchForm" action="searchTEST.php" method="get">
    <div class="form-group">
      <select name="dropDownValue" class="form-control" id="sort" style="width:163px;">
        <option value="" disabled selected>Select your option</option>
        <option value="corp">Corporation Name</option>
        <option value="incorp_dt">Incorporation Date</option>
        <option value="email">Email</option>
        <option value="zipcode">Zipcode</option>
        <option value="owner">Owner</option>
        <option value="phone">Phone</option>
      </select>
  
  &nbsp;&nbsp;
  <input name="searchValue" type="search" placeholder="....Search...." class="form-control" style="width:120px; display: inline;" />

  
  <input type="hidden" name="action" value="test">
  
  &nbsp;&nbsp;<input type="submit" class="btn btn-success" href="viewSearch.php" name="submit" value="Search">
  &nbsp;&nbsp;<input type="button" class="btn btn-danger" onclick="resetSearchForm()" value="Reset">
  
</fieldset>
</form>
<br>
<br>
<br>

</body>
</html>