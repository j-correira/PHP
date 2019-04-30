<?php

/* 
(-) search.php allows a user to search the school table on a combination of these fields.
 
 
(-) The user is not allowed to navigate directly to upload.php or search.php.
    If the user is not logged in (check by referring to a $_SESSION variable), the user is brought back to login.php.  
 */

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>J - Viewing Corporations</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>
  <body>

<h3>Search:</h3>
<form id="searchForm" action="searchResult.php" method="get">
    <div class="form-group">
      <select name="dropDownValue" class="form-control" id="sort" style="width:163px;">
        <option value="" disabled selected>Select your option</option>
        <option value="schoolName">School Name</option>
        <option value="city">City</option>
        <option value="abbreviation">Abbreviation</option>
      </select>
  
  &nbsp;&nbsp;
  <input name="searchValue" type="search" placeholder="....Search...." class="form-control" style="width:120px; display: inline;" />

  
  <input type="hidden" name="action" value="test">
  
  &nbsp;&nbsp;<input type="submit" class="btn btn-success" href="searchResult.php" name="submit" value="Search">  
</fieldset>
</form>
<br>
<br>
<br>

</body>
</html>