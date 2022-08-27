<?php

function word_count(string $sentence){
   
    $words = explode(" ", $sentence);
    // var_dump($words);
    $words_count = count($words);
     echo "This sentence has  ". $words_count . "  words";

    //while Counting words in sentence through loop mendatory to have count of array,
    //so no need to use loop because already we have count   
    return $words_count;
}

word_count("hello, world I am Poonam from Chandigarh");


?>