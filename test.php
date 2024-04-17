<?php

$nums = array(1,2,3,4,1);

function containsDuplicate($nums) {
        $count = count($nums);

        for($i = 0; $i<$count; $i++){
            for($j = $i+1; $j < $count; $j++){
                if($nums[$i] == $nums[$j]){
                    echo "true";
                }else{
                }
            }
        }
        echo "false";
    }

    containsDuplicate($nums);



    ?>