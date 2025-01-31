<?php
    //IF the range is given then 
    $primenumber = '';

    if(isset($_POST['submit']))
    {
        for($i=2;$i<=$_POST['number'];$i++)
        {
            $is_prime = primeCheck($i);
            if($is_prime)
            {
                $primenumber.= $i . ",";
            }
        }
        echo $primenumber;
    }

    function primeCheck($n)
    {
        if($n == 1)
        {
            return 0;
        }
        for($i=2;$i<=$n/2;$i++)
        {
            if($n % 2== 0)
            {
                return 0;
            }
        }
        return 1;

    }
?>



 <form method="POST">
    <input type="number"  name="number"/>
    <input type="submit" name="submit"/>
 </form>
