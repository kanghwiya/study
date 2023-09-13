<?php

include("./02_070_include2.php");

require("./02_070_include2.php");

// 파일을 불러올 때 에러가 난 상황에 따라 달라짐. 없는 파일을 불러오면 잘못된 것은 php wearning을 하고
// 이후 처리는 입력된 값 그대로 한다.
// require은 오류 발생 시 프로그램을 정지. 이후 처리도 하지 않는다.

include_once("./02_070_include2.php");

// 이전에 이미 불러왔던 파일을 다시 불러오지 않음. 중첩 되는거 방지. A에서 B를 불러오고, B에서 C를 불러오고 C에서 D를 불러오면,
// A는 C와 D를 여러번 불러오는 것이 되므로 이런 것을 방지하기 위해.

require_once("./02_070_include2.php");

// require_once도 존재함


echo "include 11111\n";

test();