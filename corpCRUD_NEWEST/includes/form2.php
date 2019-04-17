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
        
        .form-control
        {
            display: inline;
            width: 125px;
        }
  </style>    
  </head>
  <body>

<h3>Order By:</h3>
<!--

old drop down list

<form action="#" method="get">
<fieldset>
  <select name="order">
    <option value="corp">corp</option>
    <option value="incorp_dt">incorp_dt</option>
    <option value="email">email</option>
    <option value="zipcode">zipcode</option>
    <option value="owner">owner</option>
    <option value="phone">phone</option>
  </select>
-->

<form action="orderedTEST.php" method="get">
    <div class="form-group">
      <select name="dropDownValue" class="form-control" id="sort" style="width:163px;">
        <option value="corp">Corporation Name</option>
        <option value="incorp_dt">Incorporation Date</option>
        <option value="email">Email</option>
        <option value="zipcode">Zipcode</option>
        <option value="owner">Owner</option>
        <option value="phone">Phone</option>
      </select>

  &nbsp;
  <input type="radio" name="radioBTN" value="ASC" checked> Ascending
  <input type="radio" name="radioBTN" value="DESC"> Descending

  <input type="hidden" name="action" value="OrderBy">
  &nbsp;&nbsp;<input type="submit" class="btn btn-success" value="Sort">
  
  <br>
  <br>
  

    
</fieldset>
</form>

    </body>
</html>