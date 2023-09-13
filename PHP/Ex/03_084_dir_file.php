<?php

// 폴더(디렉토리) 만들기
// mkdir("../tng/testdir", 777); //make directory의 약자. 읽기권한, 쓰기 권한, 읽기+쓰기 권한

// if(mkdir("../tng/testdir", 777)) {
//     echo "정상";
// }
// else {
//     echo "실패";
// }

// 폴더 제거
// rmdir("../tng/testdir", 777);


/////////////////
//파일

$file = fopen("zz.txt","r");
// 없으면 생성, 있으면 a옵션으로 오픈

// if함수는 isset 과 같은 기능을 할 수 있음 if(조건) 조건 부분에 변수를 입력하면,
// 변수가 지정되어 있으면 참으로 인식함

// 파일 쓰기
// $f_write = fwrite($file, "탕수육");

// 파일 읽기
$line = fread($file, "6");
echo $line;

// 파일 한 줄씩 읽기
echo fgets($file);
echo fgets($file);


// 파일 전체 읽기

while ($line = fgets($file)){
    echo $line;
}

// 파일이 안열리면 거짓을 출력
// if(!$file){
//     echo "파일 안열림";
// }

// fclose($file); //파일은 쓰고 반드시 닫아줘야함.


// 파일 삭제
unlink("zz.txt","r");