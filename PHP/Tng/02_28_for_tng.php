<?php

for($i=1; $i<=5; $i++){
    echo str_repeat('*', $i),"\n";
}



// 선생님 풀이
$int_line = 1;
$int_star = 1;
while($int_line <= 5){
    while($int_star <= $int_line) {
        echo "*";
        $int_star++;
    }
    $int_star = 1; //초기화 해줘야함
    echo "*\n";
    $int_line++;
}

// 선생님 풀이2
for($line = 1; $line <= 6; $line++){
        for($star = 1; $star <= $line; $star++){
        echo "*";
    }
    echo "\n";
}



// 오른쪽 정렬 *

$star = 4;

for($line = $star; $line >= $star; $line--){
    for($blank = $line-1; $blank >=0; $blank--){
    echo str_repeat(" ",$blank),
    str_repeat("*",$line-$blank),"\n";
    }
}

// 선생님 코드

$cnt = 5;

for($int_line = $cnt; $int_line >= 1; $int_line--){
    for($int_star = 1; $int_star <= $cnt; $int_star++) {
        if($int_star >= $int_line) {
            echo "*";
        }
        else {
            echo " ";
        }
    }
    echo "\n";
}


?>