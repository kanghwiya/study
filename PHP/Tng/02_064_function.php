<?php
// 몇개일지 모르는 숫자를 다 더해주는 함수를 만들어주세요.



// function my_plus_function(...$num){
//     function my_sum($num, $num){
//         return $num + $num;
//     }

// }

// my_plus_function(1, 3, 4);

function my_add(...$number){
    $total = 0;
    foreach($number as $value) {
        $total += $value;
    }
    return $total;
}

$sum = my_add(1,5,9,7);
echo $sum;



// 재귀 함수 
function why_add($i){
    $sum = 0;
    for($i; $i > 0; $i--){
        $sum += $i;
    }
    return $sum;
}

$sum2 = why_add(5);
echo $sum2;

function my_recursion($i) {
    if($i === 1) {
        return 1;
    }
    return $i + my_recursion($i - 1);
}

echo my_recursion(3);
