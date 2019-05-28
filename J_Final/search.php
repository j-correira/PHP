<?php
include './header.php';


?>
<!--
<div class="container">
    <form id="searchCountries" action="searchResults.php" method="get">   
        <input name="searchValueCountryName" type="search" placeholder="United States" class="form-control" style="width:145px; display: inline;" />  
        &nbsp;&nbsp;<input type="submit" class="btn btn-success" href="searchResult.php" name="submit" value="Search Countries">  
        </fieldset>
    </form>
</div>
<br>
<div class="container">
    <form id="searchCountries" action="searchResults.php" method="get">   
        <input name="searchValueCountryRegion" type="search" placeholder="Oceania" class="form-control" style="width:145px; display: inline;" />  
        &nbsp;&nbsp;<input type="submit" class="btn btn-success" href="searchResult.php" name="submit" value="Search Region">  
        </fieldset>
    </form>
</div>
<br>
<br>
-->
<div class="container">
    <form id="searchCountries" action="searchResults.php" method="get">   
        <input name="searchValueCountryName3" type="search" placeholder="United States" class="form-control" style="width:145px; display: inline;" />
        <br>
        <br>
        <input name="searchValueCountryRegion3" type="search" placeholder="Oceania" class="form-control" style="width:145px; display: inline;" />  
        &nbsp;&nbsp;<input type="submit" class="btn btn-success" href="searchResult.php" name="submit" value="Search Name And/Or Region">  
        </fieldset>
    </form>
</div>


<?php include './footer.php'; ?>
