<?php

//  버블 정렬
$arr = [6,7,8,7,5,1,3,85,9];


// asort($arr);

// print_r($arr);
echo count($arr);



for($key = count($arr)-1; $key >= 0; $key--){
    for($num=0; $num <= count($arr)-1-1; $num++){
        if($arr[$num] > $arr[$num+1]){
            $tmp = $arr[$num];
            $arr[$num] = $arr[$num+1];
            $arr[$num+1] = $tmp;
        }
    }
}

print_r($arr);
// for($i = 0; $i <=9; $i++){
//     echo $arr[$i];
// }