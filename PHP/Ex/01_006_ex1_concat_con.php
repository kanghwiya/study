<?php
$str1 = "안녕";
$str2 = "하세요";
$str3 = $str1.$str2;
echo $str3;

$str4 = "문자";
$num1 = 1;
$str5 = $str4.$num1;
echo $str5, "\n";
// $num1을 문자로 변환시킴. 자동으로 형변환

// 상수 : 절대 변하지 않는 값
// 상수 이름은 무조건 대문자
define("NUM", 100);
echo NUM;


?>