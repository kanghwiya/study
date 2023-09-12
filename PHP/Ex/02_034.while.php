<?php

// while문 : 조건이 참이면 루프하는 문법
// $i = 0 //조건으로 쓸 변수
// while(조건) {}


$i = 0;
while($i <= 2) {
    echo "{$i}\n";

    $i++;
}

// 구구단 2단 찍어봅시다.
// $i2 = 1;
// while($i2 <= 9) {
//     $mul = 2 * $i2;
//     echo "2 x {$i2} = {$mul}\n";

//     $i2++;
// };


while(true) {
    $mul = 2 * $i2;
    echo "2 x {$i2} = {$mul}\n";
    if($i2 === 9){
        break;
    }
    $i2++;
};

// do ~ while : 무조건 한 번은 실행하고, 그 다음부터 조건이 참이면 루프하는 문법

// do {

// }
// while(true);

$i = 0;
do {
    echo "ttt";
}
while($i < 0);