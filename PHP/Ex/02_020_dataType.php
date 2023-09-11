<?php

// int : 숫자
$num = 1;

// string : 문자열
$str = "sssss";

// array : 배열
$arr = [1, 3, 4];

// double : 실수
$double = 2.789;

// boolean : 논리(참/거짓)
$bool = true;

// NULL
$obj = null;

// 변수의 타입을 리턴
echo gettype($str);

// 형변환 : 변수 앞에 (데이터타입)$num
$num = 1;
$str = '1';

echo $num + $str; 
// 을 출력하면 php가 데이터형을 자동으로 변환해줌. 실수하기 쉬움
echo gettype((string)$num);


?>