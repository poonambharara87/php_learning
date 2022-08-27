<?php

function distinct_elemnt($arr){
echo "<pre>";

    print_r($arr);
    $arr[] = sort($arr);
    $arr_length = count($arr);

    $distinct_ele = [];
    for($i=1; $i<$arr_length-1;$i++){

        if($arr[$i] != $arr[$i+1]){
            $distinct_ele[] = $arr[$i] . " "; 
            
        }
    }
    print_r($distinct_ele);
    return $distinct_ele;
}

distinct_elemnt(array(27, 27, 12, 24, 12,  81, 910, 56, 910, 23, 80, 87));




?>