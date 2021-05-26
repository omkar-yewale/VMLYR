<?php

function getEvenValues($array){
    foreach($array as $key => $value){
        //If $value is an array.
        if(is_array($value)){
            //loop through it.
            getEvenValues($value);
 
        } else{
            //check value is even or string. 
        if($value%2==0 && !is_string($value) ) {
            echo $value, '<br>';
           }
        }
    }
}


$data = array(1, ‘alpha’, 4, array(‘gamma’, 6, 8, array(7,9,11,90), 22, 60), 14, 51, ‘beta’);
getEvenValues($data);

?> 