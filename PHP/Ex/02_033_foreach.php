<?php

// foreach : 배열의 길이만큼 루프하는 문법

$arr = [1, 2, 3];
echo count($arr);

for($i = 0; $i <= count($arr) - 1; $i++) {
    echo $arr[$i];
}
// 배열의 숫자가 몇개인지 모르기 때문에(지금은 3개로 명확하지만), count() -1 함수를 사용함

$arr2 = [
    "현희" => "불고기"
    ,"호철" => "김치"
    ,"휘야" => "못정함"
];

foreach ($arr2 as $key => $val) {
    echo "{$key} : {$val}\n";
}

// 걍 식이 이렇게 생겨먹었음. 만약 $key가 필요없고 $value만  필요하다면,

foreach ($arr2 as $val) {
    echo "{$val}\n";
}