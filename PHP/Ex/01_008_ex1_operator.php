<?php
//  산술연산자
echo "더하기 : 1 + 1 = ", 1 + 1, "\n";
echo "빼기 : 1 - 1 =", 1 - 1, "\n";
echo "곱하기 : 2 x 3 =", 2 * 3, "\n";
echo "나누기 : 2 / 3 = ", 2 / 3,"\n";
echo "나머지 : 2 % 3 =", 2 % 3, "\n";

// 2. 증가/감소(증감) 연산자
$num1 = 8;
$num1++;
echo $num1, "\n";

$num1--;
echo $num1;

// 3. 산술 대입 연산자
$num = 5;
$num = $num + 2;
$num += 2;
// $num 값에 2를 더한다.
$num -= 2;
$num *= 2;
$num /= 2;
$num %= 2;

echo $num;

$tng_num = 10;

$tng_num += 10;
$tng_num /= 5;
$tng_num -= 4;
$tng_num %= 7;
$tng_num *= 3;
echo $tng_num;

// 4. 비교 연산자

var_dump( 1 > 0 );
// 실제 서비스하는 곳에서는 사용하면 안되는 코드. 개발 소스상에서만 사용

$num = 1 ;
$str = '1';

var_dump($num == $str); // 값의 형태만 비교(느슨한비교)
var_dump($num === $str); // 값의 데이터 타입까지 비교(완전비교) , 되도록이면 완전비교를 사용

var_dump($num != $str); // ! : 같지 않다 , 값의 형태만 비교(느슨한?불완전?비교)
var_dump($num !== $str); // 값의 데이터 타입까지 비교(완전비교) , 되도록이면 완전비교를 사용

// 5. 논리 연산자
// and or not
// and 연산자
var_dump( 1 === 1 && 2 === 2);
var_dump( 1 === 1 && 2 === 1);


// or 연산자
var_dump( 1 === 1 || 2 === 2);
var_dump( 1 === 1 || 2 === 1);
var_dump( 1 === 2 || 2 === 1);


// not 연산자
var_dump( !(1 === 1) );



?>