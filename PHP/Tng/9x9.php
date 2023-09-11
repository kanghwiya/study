<?php
for($num = 1; $num <=9; $num++){
    echo $num, "단\n";
    for($num1 = 1; $num1 <=9; $num1++){
        $num3 = $num1*$num;
        echo "{$num} x {$num1} = {$num3}\n";
    }
}

// 1,9단 출력

// for($num = 1; $num <=9; $num++){
//     if( $num == $num2 ){
//         $num2 > 2;
//     }
//     echo $num, "단\n";
//     for($num1 = 1; $num1 <=9; $num1++){
//         $num3 = $num1*$num;
//         echo "{$num} x {$num1} = {$num3}\n";
//     }
// }


// 짝수 단만 출력


// for($num = 0; $num <=9; $num+=2){
//     echo $num, "단\n";
//     for($num1 = 1; $num1 <=9; $num1++){
//         $num3 = $num1*$num;
//         echo "{$num} x {$num1} = {$num3}\n";
//     }
// }

