<?php


$num = -8;
// $str1 = "당신의 점수는 {$num}점 입니다. ";

$grade = "";

//굳이 and 문장으로 만들 필요는 없음. 
// 상위에 있는 것이 조건을 만족하면 실행되기 때문. 그냥 90이상, 80이상 조건으로 줘도 ㄱㅊ

$answer = "당신의 점수는 %u점 입니다. <%s>";

if ( $num >= 0 && $num <= 100) {

    if ( $num === 100){
        $grade = "A+";
    }
    else if( 100 > $num && $num >= 90 ){
        $grade = "A";
    }
    else if( 90 > $num && $num >= 80 ){
        $grade = "B";
    }
    else if( 80 > $num && $num >= 70 ){
        $grade = "C";
    }
    else if( 70 > $num && $num >= 60 ){
        $grade = "D";
    }
    else {
        $grade = "F";
    }

    $str = sprintf($answer, $num, $grade);
    echo $str;}

else {
    echo "잘못된 값을 입력했습니다.";
}

// echo "당신의 점수는 {$num}점입니다. <($grade)>";

