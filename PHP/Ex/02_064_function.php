<?php

// 두 숫자를 받아서 더해주는 함수를 만들어봅시다.
// 리턴이 없는 함수
function my_sum($a, $b) {
    echo $a + $b;
}

my_sum(5, 4);

// 리턴이 있는 함수
function my_sum2($a, $b) {
    return $a + $b;
}

$result = my_sum2(1, 2);
echo $result, "\n";


// 두 수를 받아서 - * / %를 리턴하는 함수를 만들어 주세요.
function my_minus($a, $b){
    return $a - $b;
}

function my_multip($a, $b){
    return $a * $b;
}

function my_divide($a, $b){
    return $a / $b;
}

function my_remainder($a, $b){
    return $a % $b;
}

$result3 = my_minus(10, 5);
echo $result3, "\n";

$result4 = my_multip(10, 5);
echo $result4, "\n";

$result5 = my_divide(10, 5);
echo $result5, "\n";

$result6 = my_remainder(10, 5);
echo $result6, "\n";

//파라미터의 기본값이 설정되어 있는 함수
// 무조건 받아야 하는 값을 앞에 두고, 디폴트 값 등은 무조건 뒤로  미룸.
function my_sum3($a, $b = 5) {
    return $a + $b;
}
echo my_sum3(4);

// 가변 파라미터 : 5.5 이하 버전에서 사용하는 것과 5.6이상에서 쓰는 두 가지 버전이 있다..
function my_args_param(...$itmes) {
    echo $items[0];
}
my_args_param("a", "b", "C");

// php 5.5이하
// function my_args_param() {
//    $items = func_get_args();
// }
// my_args_param("a", "b", "C");