<?php

/*
    (-) calculate the number of months required to pay off the amount owed along with the total amount spent.
        Be sure to also include a month by month overview of how the amount owed goes down.


  */



    $errorMsg="";
    $beginBalance=1000000;
    $interest=15;
    $payment=50;
    $interestPaid2;
    
    //interestPaid = currentAmountOwed * interest / 100 / 12
    


    if (isset($_POST['submit']))
    {
        $beginBalance = filter_input (INPUT_POST, 'beginBalance', FILTER_VALIDATE_FLOAT );
        if ($beginBalance == false){
            $errorMsg .= "<li>Please make sure the Balance is a number</li>";
        }
        
        $interest = filter_input (INPUT_POST, 'intRate', FILTER_VALIDATE_FLOAT );
        if ($interest == false) {
            $errorMsg .= "<li>Please make sure the Interest Rate is a number</li>";
        }
        
        $payment = filter_input (INPUT_POST, 'mnthPayment', FILTER_VALIDATE_FLOAT );
        if ($payment == false) {
            $errorMsg .= "<li>Please make sure the Interest Rate is a number</li>";
        }
    }
    
    
    //calculate()
    //{
        $interestPaid = $beginBalance * $interest / 100 / 12;
        //$interestPaid2 = $balance * $interest / 100;
        //$runningTotal = $balance - $interestedPaid - 
    //}
/*       
        while ($balance > 0)
        {
            $balance = $beginBalance;
            
            $balance = $balance - $payment - $interestPaid2;
            
            echo $balance . "<br>";
        }
*/              
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>J Correira</title>
</head>
<body>
    <h1 style="font-size:50px;">Credit Card Interest Calculator</h1>
    <br>
    <br>
    
<form method="post">
    Balance <input type="text" id="beginBalance" name="beginBalance" value="<?php echo $beginBalance;?>">
    <br />
    Interest Rate <input type="text" id="intRate" name="intRate" value="<?php echo $interest;?>">
    <br />
    Monthly Payment <input type="text" id="mnthPayment" name="mnthPayment" value="<?php echo $payment;?>">
    <br />

    <input type="submit" id="submit" name="submit" onclick="">
        <p>The interest paid = <?php echo number_format($interestPaid, 2);?></p>

        <br>
        <br>
<div class="alert alert-danger" role="alert">
  <?php echo $errorMsg; ?>
</div>

        
        
</form>


    
    
    
<table class="table table-striped" style="width:50%;">
    <tr>
        <th>Amount</th>
        <th>Interest</th>
    </tr>
    <tr>
        <td>1000</td>
        <td>10.99</td>
        
    </tr>
    <tr>
        <td>1000</td>
        <td>10.99</td>
        
    </tr>
    
</table>
    
    
</body>
</html>