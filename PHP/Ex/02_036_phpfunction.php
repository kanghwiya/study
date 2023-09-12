<?php


//trim : 문자열의 공백을 없애주는 함수
echo trim(" adsd ");

// strupp //strtolower : 문자열을 대/소문자로 변환하는 함수
echo strtoupper ("asdasd"), strtolower("ASDASFD");

// strlen() : 문자열의 길이를 반환
// mb_strlen() : 멀티바이트 문자열의 길이를 변환(추천!)
echo strlen("asdasd");
echo mb_strlen("가나다");

// str_replace() : 특정 문자를 치환해주는 함수 . 공백도 인식함
echo str_replace("a", "/", "edwqiosdkwqab");

// substr() : 문자열을 자르는 함수
echo substr("abcdefg", 0, 2);
echo mb_substr("한글에는 멀티바이트", 0, 5);

// strpos() : 문자열에서 특정 문자의 위치를 반환하는 함수
echo strpos("abcdefg", "d");

// isset() : 변수의 존재를 확인하는 함수. 자주 쓰임
$str = "";
var_dump(  isset($str) );

// empty() : 변수의 값이 비어있는지 확인하는 정수. 자주 쓰임. null 도 됨..
$str = "";
var_dump( empty($str));

$num = 1;
echo settype($num, "string");
echo gettype($num);

// echo phpinfo();

// time() : 1970/01/0을 기준으로 타임스탬프 시간 확인하는 함수(초단위)
echo time();

// date() : 원하ㅡㄴ 형식으로 시간을 표시
echo date("Y-m-d H:i:s", time() + (60 * 60 * 24 * 30));

// 랜덤값 구하기. 근데 어느정도 규칙이 정해져 있어서 잘안씀
echo rand (1,10);

?>