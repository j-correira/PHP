<?php

/*
    (-) calculate the number of months required to pay off the amount owed along with the total amount spent.
        Be sure to also include a month by month overview of how the amount owed goes down.

  */

    $errorMsg="";
    $beginBalance=1000;
    $interest=15;
    $payment=100;
    $month=0;
    $totalPaid=0;
    $interestPaid2;

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

        $interestPaid = $beginBalance * $interest / 100 / 12;
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <style>
        
        body
        {
            margin:auto;
            width: 522px;
            padding:45px;
            border-left: dotted 8px gray;
            border-right: dotted 8px gray;
        }
        
    </style>
    
    
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
    <br>
    <br>

    <input type="submit" id="submit" name="submit" onclick="">
    <br>
    <br>
        
<div class="alert alert-danger" role="alert">
  <?php echo $errorMsg; ?>
</div>
  
</form>
       <br>

<table class="table table-striped" style="width:100%;">
    <tr>
        <th>Month</th>
        <th>Interest Paid</th>
        <th>Amount Owed</th>
    </tr>
    <tr>
        <?php
            $balance = $beginBalance;
            $month = 0;
            while ($balance > 0)
            {
                $month++;              
                
                $interestPaid = $balance * $interest / 100 / 12;
                $balance = $balance - $payment + $interestPaid;
                $totalPaid = $beginBalance + $interestPaid;
                
                echo "<tr>";
                    //month column
                    echo "<td>";
                    echo $month;
                    echo "</td>";
                    
                    //interest paid
                    echo "<td>";
                    echo "$" . number_format($interestPaid, 2);
                    echo "</td>";
                    
                    //owed column
                    echo "<td>";
                    echo "$" . number_format($balance, 2);
                    echo "</td>";
                    

                echo "</tr>";
            } 
            
            
        ?>
        
</table>
    
    <br>
    <br>
    <h3>Total amount paid (Interest + Balance) : 
        <br>
        <?php echo "$" . number_format($totalPaid, 2); ?>
    </h3>
    
</body>
</html>