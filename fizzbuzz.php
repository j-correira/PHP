<!--
(-) Display numbers 1 through 100 
(-) display fizz if a multiple of 2
(-) buzz if a multiple of 3
(-) fizz buzz if the number is both a multiple of 2 & 3.
-->

<?php

for ($i = 1; $i <= 100; $i++)
{
    //test output
    //echo "<ul>";
    //echo ($i);
    //echo "<br>";
    
    //multiple of 2 & 3
    if ($i % 6 === 0)
    {
        //echo $i." = fizz-buzz <br>";
        echo "Fizz-Buzz <br>";
    }
    
    //multiple of 2
    elseif ($i % 2 === 0)
    {
        //echo $i." = fizz <br>";
        echo "Fizz <br>";
    }
    
    //multiple of 3
    elseif ($i % 3 === 0)
    {
        //echo $i." = fizz <br>";
        echo "Buzz <br>";
    }
    
    //not a multiple of 6
    else
    {
        echo $i."<br>";
    }   
}

?>


 