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

<h3>Search:</h3>
<form action="#" method="get">
    <div class="form-group">
      <select class="form-control" id="sort">
        <option value="corp">corp</option>
        <option value="incorp_dt">incorp_dt</option>
        <option value="email">email</option>
        <option value="zipcode">zipcode</option>
        <option value="owner">owner</option>
        <option value="phone">phone</option>
      </select>
  
  &nbsp;&nbsp;<input name="searchValue" style="width:120px; display: inline;" class="form-control" type="search" placeholder="....Search...." />

  
  <input type="hidden" name="action" value="Search">
  &nbsp;&nbsp;<input type="submit" class="btn btn-success" value="Search">
</fieldset>
</form>
<br>

</body>
</html>