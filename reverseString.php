<?php

$string = "poonam";

$reverseString = '';

for($i=strlen($string)-1;$i>=0;$i--)
{
    $reverseString .= $string[$i];
}
echo $reverseString;